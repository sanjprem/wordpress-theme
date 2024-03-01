// Fixed Header
window.onscroll = function() {
    // Use requestAnimationFrame for smoother visual updates
    requestAnimationFrame(function() {
        var header = document.querySelector('#main-navigation');
        var fixedHeaderClass = 'navigation-fixed';
        var hideClass = 'hide';

        if (window.pageYOffset > 250) {
            header.classList.add(fixedHeaderClass);
            header.classList.remove(hideClass);
        } else if (window.pageYOffset > 50) {
            header.classList.add(hideClass);
            header.classList.remove(fixedHeaderClass);
        } else {
            header.classList.remove(hideClass, fixedHeaderClass);
        }
    });
};