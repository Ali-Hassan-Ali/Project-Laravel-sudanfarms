jQuery(document).ready((function (e) {
    var i = e(".faq-ans").hide();
    i.first().show(), e(".faq-que").click((function () {
        var n = e(this);
        i.slideUp(), n.next().slideDown()
    }))
})), jQuery(document).ready((function (e) {
    var i = e(".orderlist-body").hide();
    i.first().show(), e(".orderlist-head").click((function () {
        var n = e(this);
        i.slideUp(), n.next().slideDown()
    }))
}));