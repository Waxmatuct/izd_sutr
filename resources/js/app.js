import "./bootstrap";

import "alpinejs";

import { createApp, defineAsyncComponent } from "vue";

const app = createApp({
    components: {
        NavbarComponent: defineAsyncComponent(() =>
            import("./components/NavbarComponent.vue")
        ),
        StatsComponent: defineAsyncComponent(() =>
            import("./components/StatsComponent.vue")
        ),
        BooksComponent: defineAsyncComponent(() =>
            import("./components/BooksComponent.vue")
        ),
        BarChart: defineAsyncComponent(() =>
            import("./components/BarChart.vue")
        ),
        AdminBooks: defineAsyncComponent(() =>
            import("./components/AdminBooks.vue")
        ),
    },
});

app.mount("#app");