<template>
    <vue-carousel
        :data="data"
        :controls="false"
        indicator-type="disc"
    ></vue-carousel>
</template>

<script setup>
const data = [
    '<div class="example-slide"><img src="/images/sutr.jpg"></div>',
    '<div class="example-slide"><img src="/images/slide4.jpg"></div>',
    '<div class="example-slide"><img src="/images/slide2.png"></div>',
    '<div class="example-slide"><img src="/images/slide1.png"></div>',
    '<div class="example-slide"><img src="/images/slide3.png"></div>',
];
</script>

<style>
.example-slide {
    align-items: center;
    display: flex;
    justify-content: center;
    background-color: rgba(100, 100, 100, 0.1);
    /* max-height: 400px; */
}

.vue-carousel__indicator::before {
    background-color: #000;
}
</style>
