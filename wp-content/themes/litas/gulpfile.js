const
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    autoprefixer = require('gulp-autoprefixer'),
    removeSourcemaps = require('gulp-remove-sourcemaps'),
    browserSync = require('browser-sync').create(),
    config = {
        nodeModules: './node_modules',
        cssOutputStyle: 'compressed'
    };

function browserSyncInit(done) {
    browserSync.init({
        ui: false,
        logSnippet: true,
        socket: {
            domain: 'http://localhost:3000'
        },
        scriptPath: function (path, port, options) {
            return options.getIn(['urls', 'local']) + path;
        }
    });
    done();
}

function browserSyncReload(done) {
    browserSync.reload();
    done();
}

function css() {
    return gulp.src('./assets/styles/main.scss')
        .pipe(
            sass({
                includePaths: [
                    config.nodeModules + '/bootstrap/scss'
                ],
                outputStyle: config.cssOutputStyle,
                errLogToConsole: false
            })
            .on('error', function( err ) {
                notify({ icon: false, title: 'SASS Compiling Error' }).write(err);
                this.emit('end');
            })
        )
        .pipe( autoprefixer() )
        .pipe( gulp.dest('./styles') )
        .pipe( notify({ icon: false, title: 'SASS Compiling Success', message: 'css ready' }) )
        .pipe( browserSync.stream() );
}

function js() {
    return gulp.src([
            config.nodeModules + '/bootstrap/dist/js/bootstrap.bundle.min.js',
            './assets/scripts/functions.js',
            './assets/scripts/ready/open.js', // jquery document ready: open
            './assets/scripts/nav.js',
            './assets/scripts/ready/close.js', // jquery document ready: close
        ])
        .pipe( removeSourcemaps() )
        .pipe( concat('main.js') )
        .pipe( gulp.dest('./scripts') )
        .pipe( browserSync.stream() );
}

function copy() {
    return gulp.src(config.nodeModules + '/jquery/dist/jquery.min.js')
        .pipe( gulp.dest('./scripts') );
}

function watchFiles() {
    gulp.watch('assets/styles/**/*.scss', gulp.parallel(css));
    gulp.watch('assets/scripts/*.js', gulp.parallel(js));
    gulp.watch('**/*.php', gulp.parallel(browserSyncReload));
}

const
    build = gulp.parallel(css, js, copy),
    watch = gulp.series(build, gulp.parallel(watchFiles, browserSyncInit));

exports.css = css;
exports.js = js;
exports.copy = copy;
exports.watch = watch;
exports.default = build;