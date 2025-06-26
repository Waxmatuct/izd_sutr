<template>
    <div
        id="navbar"
        class="fixed top-0 z-10 flex w-full flex-wrap items-center justify-between bg-white p-3 shadow-lg dark:bg-gray-800 sm:px-6 sm:py-3"
    >
        <!--Toggle button (hidden on large screens)-->
        <button
            @click="isOpen = !isOpen"
            type="button"
            class="absolute top-8 left-4 block text-gray-500 focus:outline-none dark:text-gray-300 lg:hidden"
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
        <div class="ml-12 flex items-center flex-shrink-1">
            <a class="flex items-center title-font" :href="homeUrl">
                <img src="/images/logo.png" alt="" class="h-16 w-16" />
                <div class="ml-2 flex-col sm:flex">
                    <h1
                        class="mb-2 hidden text-sm font-extrabold leading-5 sm:block md:mb-0 md:text-lg"
                    >
                        Редакционно-издательский центр
                    </h1>
                    <h1 class="text-xl font-extrabold leading-5 sm:hidden">
                        РИЦ СГУ
                    </h1>
                    <span class="text-xs leading-4 md:text-sm">
                        ФГБОУ ВО "Сочинский государственный университет"
                    </span>
                </div>
            </a>
        </div>
        <!--Menu-->
        <div
            class="w-full flex-grow lg:flex lg:w-auto lg:items-center"
            :class="{ 'block shadow-3xl': isOpen, hidden: !isOpen }"
        >
            <ul
                class="flex-1 items-center justify-center pt-6 text-gray-600 list-reset dark:text-gray-300 lg:flex lg:pt-0"
            >
                <li class="mr-3 ml-auto">
                    <a
                        class="inline-block rounded-lg px-4 py-2 no-underline transition-all duration-300 ease-in-out hover:bg-primary-500 hover:text-white"
                        :href="homeUrl"
                        @click="isOpen = false"
                    >
                        Главная
                    </a>
                </li>
                <li
                    class="relative mr-3"
                    v-for="(menu, index) in menus"
                    :key="index"
                    @click="menu.dropdown.value = !menu.dropdown.value"
                    @mouseover="menu.dropdown.value = true"
                    @mouseleave="menu.dropdown.value = false"
                >
                    <button
                        class="flex flex-row items-center justify-between rounded-lg px-4 py-2 no-underline transition-all duration-300 ease-in-out hover:bg-primary-500 hover:text-white focus:bg-primary-500 focus:text-white"
                    >
                        <span>{{ menu.title }}</span>
                        <svg
                            class="ml-1 h-4 w-4 fill-current"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <transition name="slide-fade">
                        <div
                            v-show="menu.dropdown.value"
                            class="absolute z-50 min-w-max origin-top-left rounded-md shadow-lg"
                        >
                            <ul
                                class="flex flex-col overflow-auto rounded-md bg-white ring-1 ring-black ring-opacity-10 white-space-nowrap dark:bg-gray-800 dark:text-gray-300 dark:ring-white"
                            >
                                <li v-for="item in menu.data" :key="item.index">
                                    <a
                                        :href="item.url"
                                        class="block px-5 py-2 hover:bg-primary-500 hover:text-white dark:hover:text-primary-400"
                                    >
                                        {{ item.title }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </transition>
                </li>
                <li class="mr-3 ml-auto" v-if="loginRouteExists">
                    <div v-if="authUser">
                        <a
                            :href="dashboardUrl"
                            class="inline-block rounded-lg px-4 py-2 no-underline transition-all duration-300 ease-in-out hover:bg-primary-500 hover:text-white"
                        >
                            Админка
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const authUser = window.authUser;
const dashboardUrl = route("dashboard.index");
const homeUrl = route("index");
const isOpen = ref(false);
const loginRouteExists = route().has("login");
const menus = [
    {
        id: "author",
        title: "Помощь автору",
        dropdown: ref(false),
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
    // {
    //     id: "ric",
    //     title: "РИЦ",
    //     dropdown: ref(false),
    //     data: [
    //         {
    //             url: route("about"),
    //             title: "О нашем центре",
    //         },
    //         {
    //             url: route("contacts"),
    //             title: "Контакты",
    //         },
    //     ],
    // },
    {
        id: "archive",
        title: "Планы изданий",
        dropdown: ref(false),
        data: [
            {
                url: route("year", [2024]),
                title: "План издания 2024",
            },
            {
                url: route("year", [2023]),
                title: "План издания 2023",
            },
            {
                url: route("year", [2022]),
                title: "План издания 2022",
            },
            {
                url: route("year", [2021]),
                title: "План издания 2021",
            },
            {
                url: route("year", [2021]),
                title: "План издания 2020",
            },
        ],
    },
];
const plan = { y2024: route("year", [2024]) };
let prevScrollpos = ref("");

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
    prevScrollpos = window.scrollY;
});

const handleScroll = () => {
    let currentScrollPos = window.scrollY;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-128px";
    }
    prevScrollpos = currentScrollPos;
};

// const selectMenu = index => {
//     menus[index].dropdown.value = !menus[index].dropdown.value
// }

// export default {
//     setup() {

//         return { plan, authUser, menus, selectMenu, isOpen, dashboardUrl, homeUrl, loginRouteExists }
//     }
// }
</script>

<style scoped>
.slide-fade-enter-active {
    transition: all 0.3s ease;
}

.slide-fade-leave-active {
    transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter,
.slide-fade-leave-to

/* .slide-fade-leave-active до версии 2.1.8 */ {
    transform: translateY(10px);
    opacity: 0;
}
</style>
