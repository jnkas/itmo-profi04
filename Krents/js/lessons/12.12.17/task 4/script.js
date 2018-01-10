$(document).ready(function () {
    let container = $('#tooltip_container');
    $('a').mouseenter(function () {
        container.text($(this).data('tip-source')).fadeIn(1000);
    }).mouseleave(function () {
        container.fadeOut(1000);
    }).mousemove(function (e) {
        container
            .css('top', e.pageY + 10 + 'px')
            .css('left', e.pageX + 10 + 'px');
    })
});