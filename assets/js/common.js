$(document).ready(function () {

    $(function () {
        var url = window.location.pathname;
        urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
        $('.navbar-nav a').each(function () {
            if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                $('.navbar-nav a').removeClass('active');
                $(this).addClass('active');
            }
        });
    });
})