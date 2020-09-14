export default () => {
    if ( $(this).scrollTop() > 20 ) {
        $('.navbar-main').addClass('flattened');
    } else {
        $('.navbar-main').removeClass('flattened');
    }
}