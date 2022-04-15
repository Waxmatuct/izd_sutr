require("./bootstrap");

var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-128px";
    }
    prevScrollpos = currentScrollPos;
};

import Vue from "vue";

window.onload = function () {
    const app = new Vue({
        el: "#app",
        components: {
            NavbarComponent: () => import("./components/NavbarComponent.vue"),
            StatsComponent: () => import("./components/StatsComponent.vue"),
            BooksComponent: () => import("./components/BooksComponent.vue"),
            BarChart: () => import("./components/BarChart.vue"),
        },
    });
};
