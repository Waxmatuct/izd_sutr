import "./bootstrap";

import "alpinejs";

import Inputmask from "inputmask";

import { createApp, defineAsyncComponent } from "vue";
import VueCarousel from "@chenfengyuan/vue-carousel";

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
        CarouselComponent: defineAsyncComponent(() =>
            import("./components/CarouselComponent.vue")
        ),
    },
});
app.component(VueCarousel.name, VueCarousel);
app.mount("#app");

Inputmask({
    placeholder: "дд.мм.гггг",
    alias: "datetime",
    inputFormat: "dd.mm.yyyy",
    inputmode: "numeric",
}).mask("#registered_at");
