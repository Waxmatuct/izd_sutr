<script setup>
import gsap from "gsap";
import { onMounted } from "vue";

const props = defineProps({
    count: Number,
    sdano: Number,
    perc: Number,
    size: Number,
})

onMounted(() => {
    const items = document.querySelectorAll(".data");
    gsap.from(items, {
        textContent: 0,
        duration: 1,
        delay: 0.5,
        snap: { textContent: 1 },
    });
})

</script>

<template>
    <div class="mb-10 grid grid-cols-2 gap-4 text-center sm:grid-cols-4">
        <div class="w-full rounded-lg p-4 shadow-lg square">
            <h2 class="text-3xl font-bold data title-font sm:text-5xl">
                {{ count }}
            </h2>
            <p class="text-gray-600">изданий в плане</p>
        </div>
        <div class="w-full rounded-lg p-4 shadow-lg square">
            <h2 class="text-3xl font-bold data title-font sm:text-5xl">
                {{ sdano }}
            </h2>
            <p class="text-gray-600">принято к изданию</p>
        </div>
        <div class="w-full rounded-lg p-4 shadow-lg square">
            <h2 class="text-3xl font-bold data title-font sm:text-5xl">
                {{ perc }}%
            </h2>
            <p class="text-gray-600">выполнение плана</p>
        </div>
        <div class="w-full rounded-lg p-4 shadow-lg square">
            <h2 class="text-3xl font-bold data title-font sm:text-5xl">
                {{ size }}
            </h2>
            <p class="text-gray-600">общий объем уч.-изд. л.</p>
        </div>
    </div>
</template>
