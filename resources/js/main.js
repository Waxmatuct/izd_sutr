require("./bootstrap");

import {createApp, defineAsyncComponent} from "vue";

const app = createApp({});

const NavbarComponent = defineAsyncComponent(
    () => import("./components/NavbarComponent.vue"),
);

const StatsComponent = defineAsyncComponent(
    () => import("./components/StatsComponent.vue")
);

const BooksComponent = defineAsyncComponent(
    () => import("./components/BooksComponent.vue")
);

const BarChart = defineAsyncComponent(
    () => import("./components/BarChart.vue")
);

const AdminBooks = defineAsyncComponent(
    () => import("./components/AdminBooks.vue")
);

app.component('navbar-component', NavbarComponent);
app.component('stats-component', StatsComponent);
app.component('books-component', BooksComponent);
app.component('bar-chart', BarChart);
app.component('admin-books', AdminBooks);

app.mount('#app');

