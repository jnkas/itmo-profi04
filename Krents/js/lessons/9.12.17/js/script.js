$(function () {
    $('#rightClick').on('contextmenu selectstart', clickHandler);

    function clickHandler(e) {
        e.preventDefault();
    }

    $('table tr')
        .filter(':odd')
        .css('background-color', 'orange')
        .end()
        .filter(':even')
        .css('background-color', 'green');

    // $('table')
    //     .on('click', function () {
    //             window.print();
    //         }
    //     );
    // $('td')
    //     .on('click', function (e) {
    //             $(this)
    //                 .text('Cum domina messis, omnes homoes tractare flavum, dexter accentores.')
    //                 .off();
    //         }
    //     );
    $('td')
        .one('click', function (e) {
                $(this)
                    .text('Cum domina messis, omnes homoes tractare flavum, dexter accentores.');
            }
        );
});
