require("./bootstrap");

import Vue from "vue";

window.onload = function () {
    const app = new Vue({
        el: "#app",
        components: {
            NavbarComponent: () => import("./components/NavbarComponent.vue"),
            StatsComponent: () => import("./components/StatsComponent.vue"),
            BooksComponent: () => import("./components/BooksComponent.vue"),
            BarChart: () => import("./components/BarChart.vue"),
            AdminBooks: () => import("./components/AdminBooks.vue"),
        },
    });
};
