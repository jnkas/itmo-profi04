// $(function () {
//     let mainDiv = $('#myCalendar');
//     let divDay = $('<div class="current-date"></div>'),
//         dayDiv = $('<div class="current-day"></div>'),
//         monthDiv = $('<div class="current-month"></div>'),
//         monthes = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
//     let date = new Date();
//     dayDiv.text(date.getDate());
//     monthDiv.text(monthes[date.getMonth()]);
//     divDay
//         .append(dayDiv)
//         .append(monthDiv);
//     mainDiv.append(divDay);
//     $.ajax({
//         url: '/calendar/get_event',
//         method: 'POST',
//         data: {date: date.getDate() + '.' + (date.getMonth() + 1) + '.' + date.getFullYear()},
//         dataType: 'json',
//         success: function (response) {
//             let eventMain = $('<div class="current-event"></div>'),
//                 eventTitle = $('<div class="current-event-title"></div>'),
//                 eventImg = $('<div class="current-event-img"></div>'),
//                 eventDesc = $('<div class="current-event-desc"></div>');
//
//             eventImg.append($('<img src="'+response.img_url+'">'));
//             eventTitle.text(response.header);
//             eventDesc.text(response.desc);
//             eventMain
//                 .append(eventTitle)
//                 .append(eventImg)
//                 .append(eventDesc);
//             mainDiv.append(eventMain);
//         },
//         error: function (response) {
//         }
//     });
//
//
// });


$(function () {
    let mainDiv = $('#myCalendar');
    let date = new Date();

    updateCurrentNews(date.getDate() + '.' + (date.getMonth() + 1) + '.' + date.getFullYear());
    $('#calendar td').click(function (event) {
        updateCurrentNews($(event.target).data('date'));
    });
    let eventMain = $('<div class="current-event"></div>'),
        eventTitle = $('<div class="current-event-title"></div>'),
        eventImg = $('<div class="current-event-img"></div>'),
        eventDesc = $('<div class="current-event-desc"></div>');
    $("#filterEvents").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: '/calendar/get_filter_event',
            method: 'POST',
            data: $(event.target).serializeArray(),
            dataType: 'json',
            success: function (response) {
                eventMain.empty();
                eventTitle.empty();
                eventImg.empty();
                eventDesc.empty();
                for (let key in response) {
                    let eventNew = $('<div class="current-event-daily"></div>'),
                        eventTitleFilter= $('<div class="current-event-title"></div>'),
                        eventImgFilter = $('<div class="current-event-img"></div>'),
                        eventDescFilter = $('<div class="current-event-desc"></div>');
                    let dataEvent = JSON.parse(response[key]);
                    eventImgFilter.append($('<img src="' + dataEvent.img_url + '">'));
                    eventTitleFilter.text(key + ': ' + dataEvent.header);
                    eventDescFilter.text(dataEvent.desc);
                    eventNew
                        .append(eventTitleFilter)
                        .append(eventImgFilter)
                        .append(eventDescFilter);
                    eventMain.append(eventNew);
                }

            },
            error: function (response) {
                eventMain.empty();
                eventTitle.empty();
                eventImg.empty();
                eventDesc.empty();
                eventMain
                    .append($('<p>На выбранную дату нет новости</p>'));
            }
        });
    });

    function updateCurrentNews(date) {
        $('#calendar')
            .find('td')
            .removeClass('check-date')
            .end()
            .find('[data-date="' + date + '"]')
            .addClass('check-date');

        $.ajax({
            url: '/calendar/get_event',
            method: 'POST',
            data: {date: date},
            dataType: 'json',
            success: function (response) {
                eventMain.empty();
                eventTitle.empty();
                eventImg.empty();
                eventDesc.empty();

                eventImg.append($('<img src="' + response.img_url + '">'));
                eventTitle.text(response.header);
                eventDesc.text(response.desc);
                eventMain
                    .append(eventTitle)
                    .append(eventImg)
                    .append(eventDesc);
                mainDiv.append(eventMain);
            },
            error: function (response) {
                eventMain.empty();
                eventTitle.empty();
                eventImg.empty();
                eventDesc.empty();
                eventMain
                    .append($('<p>На выбранную дату нет новости</p>'));
            }
        });
    }

});