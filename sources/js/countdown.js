"use strict"
var date = day * 24 * 60 * 60;

var countdown = setInterval(function () {
    var dDays, dHours, dMinutes, dSecond;
    date = date - 1;
    dDays = Math.floor(date / (60 * 60 * 24));
    dHours = Math.floor(date % (60 * 60 * 24) / (60 * 60));
    dMinutes = Math.floor(date % (60 * 60) / (60));
    dSecond = Math.floor(date % 60);

    document.getElementById("days").innerHTML = dDays;
    document.getElementById("hours").innerHTML = dHours;
    document.getElementById("minutes").innerHTML = dMinutes;
    document.getElementById("seconds").innerHTML = dSecond;

    if (date == 0) {
        clearInterval(countdown);
    }
}, 1000);