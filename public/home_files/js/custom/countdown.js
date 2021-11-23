$("[data-countdown]").each((function () {
    var s = $(this),
        a = $(this).data("countdown");
    s.hasClass("countdown-full-format"), s.countdown(a, (function (a) {
        s.html(a.strftime('<span class="countdown-time"><span>%D</span><small>أيام</small></span> <span class="countdown-time"><span>%H</span><small>ساعات</small></span> <span class="countdown-time"><span>%M</span><small>دقائق</small></span> <span class="countdown-time"><span>%S</span><small>ثواني</small></span>'))
    }))
}));