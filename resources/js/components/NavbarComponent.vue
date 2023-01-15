<template>
    <div
        id="top-menu"
        class="bg-white dark:bg-gray-800 flex items-center justify-between flex-wrap p-3 sm:px-6 sm:py-3 fixed w-full z-10 top-0 shadow-lg"
    >
        <!--Toggle button (hidden on large screens)-->
        <button
            @click="isOpen = !isOpen"
            type="button"
            class="absolute left-4 top-8 block lg:hidden text-gray-500 dark:text-gray-300 focus:outline-none"
            :class="{ 'transition transform-180': isOpen }"
        >
            <svg
                class="h-8 w-8 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
            >
                <path
                    v-show="isOpen"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
                />
                <path
                    v-show="!isOpen"
                    fill-rule="evenodd"
                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                />
            </svg>
        </button>
        <!--Logo etc-->
        <div class="flex items-center flex-shrink-1 ml-12">
            <a class="flex title-font items-center" :href="homeUrl">
                <img src="/images/logo.png" alt="" class="w-16 h-16" />
                <div class="sm:flex flex-col ml-2">
                    <h1
                        class="hidden sm:block text-sm font-extrabold md:text-lg leading-5 mb-2 md:mb-0"
                    >
                        Редакционно-издательский центр СГУ
                    </h1>
                    <h1 class="text-xl sm:hidden font-extrabold leading-5">
                        РИЦ СГУ
                    </h1>
                    <span class="text-xs md:text-sm leading-4">
                        Информационно-справочный ресурс
                    </span>
                </div>
            </a>
        </div>
        <!--Menu-->
        <div
            class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
            :class="{ 'block shadow-3xl': isOpen, hidden: !isOpen }"
        >
            <ul
                class="pt-6 lg:pt-0 list-reset lg:flex justify-center flex-1 items-center text-gray-600 dark:text-gray-300"
            >
                <li class="ml-auto mr-3">
                    <a
                        class="inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300"
                        :href="plan.y2023"
                        @click="isOpen = false"
                        >План издания 2023
                    </a>
                </li>
                <li
                    class="relative mr-3"
                    @click="menu.dropdown = !menu.dropdown"
                    @mouseover="menu.dropdown = true"
                    @mouseleave="menu.dropdown = false"
                    v-for="menu in menus"
                    :key="menu.index"
                >
                    <button
                        class="flex flex-row justify-between items-center py-2 px-4 no-underline focus:bg-primary-500 focus:text-white hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300"
                    >
                        <span>{{ menu.title }}</span>
                        <div class="ml-1">
                            <svg
                                class="fill-current h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                    </button>
                    <transition name="slide-fade">
                        <div
                            v-show="menu.dropdown"
                            class="absolute z-50 min-w-max rounded-md shadow-lg origin-top-left"
                        >
                            <ul
                                class="bg-white dark:bg-gray-800 dark:text-gray-300 rounded-md ring-1 ring-black dark:ring-white ring-opacity-10 flex flex-col white-space-nowrap overflow-auto"
                            >
                                <li v-for="item in menu.data" :key="item.index">
                                    <a
                                        :href="item.url"
                                        class="block hover:text-white hover:bg-primary-500 dark:hover:text-primary-400 py-2 px-5"
                                    >
                                        {{ item.title }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </transition>
                </li>
                <!-- <li class="mr-3">
                    <switcher></switcher>
                </li> -->
                <li class="ml-auto mr-3" v-if="loginRouteExists">
                    <div v-if="this.authUser">
                        <a
                            :href="dashboardUrl"
                            class="inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300"
                        >
                            Админка
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
// import Switcher from "./Switcher.vue";

export default {
    // components: {
    //     Switcher,
    // },
    data() {
        return {
            authUser: window.authUser,
            isOpen: false,
            currentRoute: route().current(),
            homeUrl: route("index"),
            dashboardUrl: route("dashboard.index"),
            loginRouteExists: route().has("login"),
            plan: {
                y2023: route("year", [2023]),
            },
            menus: [
                {
                    id: "author",
                    title: "Помощь",
                    dropdown: false,
                    data: [
                        {
                            url: route("help"),
                            title: "Авторская редакция. Требования к оформлению",
                        },
                        {
                            url: route("blanks"),
                            title: "Формы заявок на тиражирование",
                        },
                        {
                            url: route("types"),
                            title: "Виды вузовского учебно-методического обеспечения",
                        },
                        {
                            url: route("glossary"),
                            title: "Краткий словарь издательских терминов",
                        },
                        // {
                        //     url: route("biblio"),
                        //     title: "Примеры оформления библиографических ссылок",
                        // },
                    ],
                },
                {
                    id: "ric",
                    title: "РИЦ",
                    dropdown: false,
                    data: [
                        {
                            url: route("about"),
                            title: "О нашем центре",
                        },
                        {
                            url: route("paid-services"),
                            title: "Платные услуги",
                        },
                        {
                            url: route("contacts"),
                            title: "Контакты",
                        },
                    ],
                },
                {
                    id: "archive",
                    title: "Архив",
                    dropdown: false,
                    data: [
                        {
                            url: route("year", [2022]),
                            title: "План издания 2022",
                        },
                        {
                            url: route("year", [2021]),
                            title: "План издания 2021",
                        },
                        {
                            url: route("year", [2020]),
                            title: "План издания 2020",
                        },
                    ],
                },
            ],
        };
    },
    mounted() {
        // console.log(this.plan.y2022);
    },
    methods: {
        // onLoaded() {
        //     this.loaded = true;
        // },
    },
};
</script>

<style scoped>
.slide-fade-enter-active {
    transition: all 0.3s ease;
}
.slide-fade-leave-active {
    transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active до версии 2.1.8 */ {
    transform: translateY(10px);
    opacity: 0;
}
</style>
