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

window.Vue = require("vue").default;

Vue.component("stats-component", () =>
    import("./components/StatsComponent.vue")
);

Vue.component("books-component", () =>
    import("./components/BooksComponent.vue")
);

window.onload = function () {
    const stats = new Vue({
        el: "#stats",
    });
    const books = new Vue({
        el: "#books",
    });
};
