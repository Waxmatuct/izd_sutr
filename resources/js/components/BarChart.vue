<template>
    <Bar :options="chartOptions" :data="chartData" id="chartId" :dataset-id-key="datasetIdKey" :plugins="plugins"
        :css-classes="cssClasses" :styles="styles" :width="width" :height="height" />
</template>

<script>
import { Bar } from "vue-chartjs";

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
            default: 200,
        },
        height: {
            type: Number,
            default: 500,
        },
        cssClasses: {
            default: "",
            type: String,
        },
        styles: {
            type: Object,
            default: () => { },
        },
        plugins: {
            type: Array,
            default: () => [],
        },
        value: {
            type: Object,
            default: () => [],
        },
        handed: {
            type: Object,
            default: () => [],
        },
    },

    setup(props) {
        const chartData = {
            datasets: [
                {
                    label: "Запланировано",
                    data: props.value,
                    backgroundColor: ["rgba(99, 102, 241, 0.5)"],
                    borderColor: ["rgba(99, 102, 241, 0.7)"],
                    borderWidth: 3,
                    borderRadius: 10,
                },
                {
                    label: "Сдано",
                    data: props.handed,
                    backgroundColor: ["rgba(75, 192, 192, 0.5)"],
                    borderColor: ["rgba(75, 192, 192, 0.7)"],
                    borderWidth: 3,
                    borderRadius: 10,
                },
            ],
        }

        const chartOptions = {
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
                    text: "Выполнение плана издания",
                    font: {
                        size: 16,
                    },
                },
            },
        }

        return { chartData, chartOptions }
    }
}
</script>
