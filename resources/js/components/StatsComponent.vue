<template>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center mb-10">
        <div class="square p-4 w-full shadow-lg rounded-lg">
            <h2 class="data title-font font-bold sm:text-5xl text-3xl">
                {{ this.count }}
            </h2>
            <p class="text-gray-600">изданий в плане</p>
        </div>
        <div class="square p-4 w-full shadow-lg rounded-lg">
            <h2 class="data title-font font-bold sm:text-5xl text-3xl">
                {{ this.sdano }}
            </h2>
            <p class="text-gray-600">принято к изданию</p>
        </div>
        <div class="square p-4 w-full shadow-lg rounded-lg">
            <h2 class="data title-font font-bold sm:text-5xl text-3xl">
                {{ this.perc }}%
            </h2>
            <p class="text-gray-600">выполнение плана</p>
        </div>
        <div class="square p-4 w-full shadow-lg rounded-lg">
            <h2 class="data title-font font-bold sm:text-5xl text-3xl">
                {{ this.size }}
            </h2>
            <p class="text-gray-600">общий объем уч.-изд. л.</p>
        </div>
    </div>
</template>

<script>
import gsap from "gsap";
export default {
    data() {
        return {
            // authUser: window.authUser,
        };
    },
    props: ["count", "sdano", "perc", "size"],
    mounted() {
        // console.log(this.animation);
        this.animation();
    },
    methods: {
        animation() {
            const items = document.querySelectorAll(".data");
            gsap.from(items, {
                textContent: 0,
                duration: 1,
                delay: 0.5,
                snap: { textContent: 1 },
            });
        },
    },
};
</script>
