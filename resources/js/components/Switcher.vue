<template>
    <div class="flex items-center px-3 py-1 lg:justify-center">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="mr-1 h-5 w-5 text-gray-800 dark:text-gray-200"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
            />
        </svg>

        <label class="switch">
            <input type="checkbox" v-model="darkMode" />
            <span class="slider round"></span>
        </label>

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="ml-1 h-5 w-5 text-gray-800 dark:text-gray-200"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
            />
        </svg>
    </div>
</template>

<script>
export default {
    data() {
        return {
            darkMode: false,
        };
    },
    mounted() {
        // check for active theme
        let htmlElement = document.documentElement;
        let theme = localStorage.getItem("theme");
        let htmlClass = htmlElement.classList;

        if (theme === "dark") {
            htmlElement.setAttribute("theme", "dark");
            htmlClass.add("dark");
            this.darkMode = true;
        } else {
            htmlElement.setAttribute("theme", "light");
            htmlClass.remove("dark");
            this.darkMode = false;
        }
    },
    watch: {
        darkMode: function () {
            // add/remove class to/from html tag
            let htmlElement = document.documentElement;
            let htmlClass = htmlElement.classList;

            if (this.darkMode) {
                localStorage.setItem("theme", "dark");
                htmlClass.add("dark");
                htmlElement.setAttribute("theme", "dark");
            } else {
                localStorage.setItem("theme", "light");
                htmlClass.remove("dark");
                htmlElement.setAttribute("theme", "light");
            }
        },
    },
};
</script>

<!-- Use preprocessors via the lang attribute! e.g. <style lang="scss"> -->
<style scoped>
.switch {
    position: relative;
    display: inline-block;
    width: 36px;
    height: 20px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: 0.7s;
    transition: 0.7s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 2px;
    bottom: 2px;
    background-color: white;
    -webkit-transition: 0.7s;
    transition: 0.7s;
}

input:checked + .slider {
    background: #3b82f6;
}

input:checked + .slider:before {
    -webkit-transform: translateX(16px);
    -ms-transform: translateX(16px);
    transform: translateX(16px);
}
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>
