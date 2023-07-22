<template>
  <Bar :data="chartInformation" :options="chartOptions" :style="{height: '300px'}"/>
</template>

<script>
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js'
import { Bar } from 'vue-chartjs'
ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)

export default {
    components: {
        Bar
    },
    props: {
        labels: {
            type: Object,
            required: true,
            default: []
        },
        totals: {
            type: Object,
            required: true,
            default: []
        }
    },
    computed: {
        chartInformation(){
            return {
                labels: this.labels,
                datasets: [
                    {
                        label: 'Usuarios registrados',
                        backgroundColor: '#f87979',
                        data: this.totals
                    }
                ]
            }
        },
        chartOptions(){
            return {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    }
}
</script>

<style>

</style>