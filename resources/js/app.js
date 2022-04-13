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
import BooksComponent from "./components/BooksComponent";

window.onload = function () {
    const stats = new Vue({
        el: "#stats",
        components: {
            StatsComponent,
        },
    });
    const books = new Vue({
        el: "#books",
        components: {
            BooksComponent,
        },
    });
};
