<template>
    <Bar
        :chart-options="chartOptions"
        :chart-data="chartData"
        :chart-id="chartId"
        :dataset-id-key="datasetIdKey"
        :plugins="plugins"
        :css-classes="cssClasses"
        :styles="styles"
        :width="width"
        :height="height"
    />
</template>

<script>
import { Bar } from "vue-chartjs/legacy";

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);
export default {
    name: "BarChart",
    components: {
        Bar,
    },
    props: {
        chartId: {
            type: String,
            default: "bar-chart",
        },
        datasetIdKey: {
            type: String,
            default: "label",
        },
        width: {
            type: Number,
            default: 400,
        },
        height: {
            type: Number,
            default: 400,
        },
        cssClasses: {
            default: "",
            type: String,
        },
        styles: {
            type: Object,
            default: () => {},
        },
        plugins: {
            type: Array,
            default: () => [],
        },
        value: {
            type: Object,
            default: "value",
        },
        handed: {
            type: Object,
            default: "is_handed",
        },
    },
    data() {
        return {
            chartData: {
                // labels: [
                //     "Январь",
                //     "Февраль",
                //     "Март",
                //     "Апрель",
                //     "Май",
                //     "Июнь",
                //     "Июль",
                //     "Август",
                //     "Cентябрь",
                // ],
                datasets: [
                    {
                        label: "Запланировано",
                        data: this.value,
                        backgroundColor: ["rgba(99, 102, 241, 0.5)"],
                        borderColor: ["rgba(99, 102, 241, 0.7)"],
                        borderWidth: 2,
                    },
                    {
                        label: "Сдано",
                        data: this.handed,
                        backgroundColor: ["rgba(75, 192, 192, 0.5)"],
                        borderColor: ["rgba(75, 192, 192, 0.7)"],
                        borderWidth: 2,
                    },
                ],
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    legend: {
                        position: "bottom",
                    },
                    title: {
                        display: true,
                        text: "Динамика сдачи изданий по месяцам",
                        font: {
                            size: 16,
                        },
                    },
                },
            },
        };
    },
    mounted() {
        console.log(this.value);
        // this.getValues();
        // this.getHanded();
    },
    methods: {
        getValues() {
            this.chartData.datasets[0].data = this.value.split(", ");
        },
        getHanded() {
            this.chartData.datasets[1].data = this.is_handed.split(", ");
        },
    },
};
</script>
