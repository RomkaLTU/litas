'use strict';

import plugins       from 'gulp-load-plugins'
import yargs         from 'yargs'
import browser       from 'browser-sync'
import gulp          from 'gulp'
import rimraf        from 'rimraf'
import yaml          from 'js-yaml'
import fs            from 'fs'
import webpackStream from 'webpack-stream'
import webpack4      from 'webpack'
import named         from 'vinyl-named'

// Load all Gulp plugins into one variable
const $ = plugins();

// Check for --production flag
const PRODUCTION = !!(yargs.argv.production);

// Load settings from settings.yml
const { COMPATIBILITY, PORT, PATHS } = loadConfig();

function loadConfig() {
    let ymlFile = fs.readFileSync('config.yml', 'utf8');
    return yaml.load(ymlFile);
}

// Build the "dist" folder by running all of the below tasks
gulp.task('build',
    gulp.series(clean, gulp.parallel(javascript), sass));

// Build the site, run the server, and watch for file changes
gulp.task('default',
    gulp.series('build', server, watch));

// Delete the "dist" folder
// This happens every time a build starts
function clean(done) {
    rimraf(PATHS.dist, done);
}

// Compile SCSS into CSS
// In production, the CSS is compressed
function sass() {
    return gulp.src('assets/styles/main.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            includePaths: PATHS.sass
        }).on('error', $.sass.logError))
        .pipe($.autoprefixer())
        .pipe($.if(PRODUCTION, $.cleanCss({compatibility: 'ie9'})))
        .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
        .pipe(gulp.dest(PATHS.dist + '/css'))
        .pipe(browser.reload({ stream: true }));
}

let webpackConfig = {
    externals: { jquery: 'jQuery' },
    mode: (PRODUCTION ? 'production' : 'development'),
    module: {
        rules: [
            {
                test: /.js$/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env'],
                            compact: false
                        }
                    }
                ]
            },
            {
                test:/\.css$/,
                use:['style-loader','css-loader']
            }
        ]
    },
    devtool: !PRODUCTION && 'source-map'
};

// Combine JavaScript into one file
// In production, the file is minified
function javascript() {
    return gulp.src(PATHS.entries)
        .pipe(named())
        .pipe($.sourcemaps.init())
        .pipe(webpackStream(webpackConfig, webpack4))
        .pipe($.if(PRODUCTION, $.uglify()
            .on('error', e => { console.log(e); })
        ))
        .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
        .pipe(gulp.dest(PATHS.dist + '/js'));
}

// Start a server with BrowserSync to preview the site in
function server(done) {
    browser.init({
        proxy: "litas.test",
    });
    done();
}

// Watch for changes to static assets, pages, Sass, and JavaScript
function watch() {
    gulp.watch(PATHS.assets);
    gulp.watch('assets/styles/**/*.scss').on('all', sass);
    gulp.watch('assets/scripts/**/*.js').on('all', gulp.series(javascript, browser.reload));
}
