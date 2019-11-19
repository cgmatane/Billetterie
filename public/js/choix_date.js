var vanillaCalendar = {
    month: document.querySelectorAll('[data-calendar-area="month"]')[0],
    next: document.querySelectorAll('[data-calendar-toggle="next"]')[0],
    previous: document.querySelectorAll('[data-calendar-toggle="previous"]')[0],
    label: document.querySelectorAll('[data-calendar-label="month"]')[0],
    strmonths: document.querySelectorAll('.mois'),
    activeDates: null, date: new Date, todaysDate: new Date,
    init: function (t) {
        this.options = t, this.date.setDate(1), this.createMonth(), this.createListeners()
    },
    createListeners: function () {
        var t = this;
        this.next.addEventListener("click",
            function () {
                t.clearCalendar();
                var e = t.date.getMonth() + 1;
                t.date.setMonth(e), t.createMonth()
            }),
            this.previous.addEventListener("click", function () {
                t.clearCalendar();
                var e = t.date.getMonth() - 1;
                t.date.setMonth(e), t.createMonth()
            })
    },
    createDay: function (t, e, a) {
        var n = document.createElement("div"),
            s = document.createElement("span");
        var dateLimite = new Date();
        ceMois = this.todaysDate.getUTCMonth();
        dateLimite.setUTCMonth(ceMois+3);
        s.innerHTML = t, n.className = "vcal-date",
            n.setAttribute("data-calendar-date", this.date),
        1 === t && (n.style.marginLeft = 0 === e ? 6 * 14.28 + "%" : 14.28 * (e - 1) + "%"),
            this.options.disablePastDays && this.date.getTime() <= this.todaysDate.getTime() - 1
            ||  this.date > dateLimite
                ? n.classList.add("vcal-date--disabled") : (n.classList.add("vcal-date--active"),
                n.setAttribute("data-calendar-status", "active")),
        this.date.toString() === this.todaysDate.toString() && n.classList.add("vcal-date--today"),
            n.appendChild(s),
            this.month.appendChild(n)
    },
    dateClicked: function () {
        var t = this;
        this.activeDates = document.querySelectorAll('[data-calendar-status="active"]');
        for (var e = 0; e < this.activeDates.length; e++)
            this.activeDates[e].addEventListener("click", function (e) {
                window.location = '/date?date=' + this.dataset.calendarDate
            })
    },
    createMonth: function () {
        for (var t = this.date.getMonth(); this.date.getMonth() === t;)
            this.createDay(this.date.getDate(), this.date.getDay(), this.date.getFullYear()),
                this.date.setDate(this.date.getDate() + 1);
        this.date.setDate(1), this.date.setMonth(this.date.getMonth() - 1),
            this.label.innerHTML = this.monthsAsString(this.date.getMonth()) + " " + this.date.getFullYear(),
            this.dateClicked()
    }, monthsAsString: function (t) {
        return this.strmonths[t].innerHTML;
    },
    clearCalendar: function () {
        vanillaCalendar.month.innerHTML = ""
    },
    removeActiveClass: function () {
        for (var t = 0; t < this.activeDates.length; t++) this.activeDates[t].classList.remove("vcal-date--selected")
    }
};
window.addEventListener('load', function () {
    vanillaCalendar.init({
        disablePastDays: true
    });
});

function soumettreFormulaire508(formulaire) {
    let date = formulaire.querySelector('input[type=date]').value;
    return date.match(/^\d\d\d\d-\d\d-\d\d$/) !== null;
}