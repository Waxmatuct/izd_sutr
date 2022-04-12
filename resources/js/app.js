require("./bootstrap");

require("alpinejs");

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
// import ExampleComponent from "./components/ExampleComponent";
import StatsComponent from "./components/StatsComponent";

window.onload = function () {
    const app = new Vue({
        el: "#app",
        components: {
            StatsComponent,
        },
    });
};
