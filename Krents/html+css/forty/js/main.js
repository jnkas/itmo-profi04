$(function () {
    var url = new URL(window.location.href);
    var pageParam = url.searchParams.get("page");
    var page = 'index';
    var pages = ['index', 'generic', 'landing'];
    console.log(pages.indexOf(pageParam));
    if (pages.indexOf(pageParam) !== -1) {
        page = pageParam;
    }
    $("#included").load("pages/" + page + ".html");
});