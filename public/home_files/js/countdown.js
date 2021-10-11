$("[data-countdown]").each((function () {
    var s = $(this),
        a = $(this).data("countdown");
    s.hasClass("countdown-full-format"), s.countdown(a, (function (a) {
        s.html(a.strftime('<span class="countdown-time"><span>%D</span><small>Ø£ÙŠØ§Ù…</small></span> <span class="countdown-time"><span>%H</span><small>Ø³Ø§Ø¹Ø§Øª</small></span> <span class="countdown-time"><span>%M</span><small>Ø¯Ù‚Ø§Ø¦Ù‚</small></span> <span class="countdown-time"><span>%S</span><small>Ø«ÙˆØ§Ù†ÙŠ</small></span>'))
    }))
}));