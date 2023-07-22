<template>
    <BaseLayout>
        <VOnboardingWrapper ref="wrapper" :steps="steps" :options="options" />
        <Head title="Usuarios"></Head>
        <div class="w-full flex justify-center items-center p-4" id="stats">
            <Stats :stats="statsObject"/>
        </div>
        <div class="flex flex-row justify-end w-full p-2">
            <button class="btn btn-secondary" id="register">Registrar usuario</button>
        </div>
        <div class="p-4 flex flex-row justify-center w-full" id="chart">
            <BarChart :labels="labels" :totals="totals"/>
        </div>
    </BaseLayout>
</template>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue';
import Stats from '@/Components/Users/Stats.vue';
import BarChart from '@/Components/Users/BarChart.vue';
import { Head } from '@inertiajs/vue3';
import { VOnboardingWrapper, useVOnboarding } from 'v-onboarding'
import { ref } from 'vue'
import 'v-onboarding/dist/style.css'

export default {
    components: {
        BaseLayout,
        Stats,
        Head,
        BarChart,
        VOnboardingWrapper
    },
    setup() {
        const wrapper = ref(null)
        const { start, goToStep, finish } = useVOnboarding(wrapper)
        const steps = [
            { 
                attachTo: { element: '#stats' }, 
                content: { 
                    title: "Estadísticas!",
                    description: "Números sobre el crecimiento de usuarios de la app."
                } 
            },
            { 
                attachTo: { element: '#chart' }, 
                content: { 
                    title: "Visualización!",
                    description: "Crecimiento de usuarios mediante gráfico de barras."
                } 
            },
            { 
                attachTo: { element: '#register' }, 
                content: { 
                    title: "Registro!",
                    description: "Agrega nuevos usuarios para mantener altos los números."
                } 
            }
        ]

        const options = {
            labels: {
                previousButton: 'Anterior',
                nextButton: 'Siguiente',
                finishButton: 'Finalizar'
            }
        }

        return {
            wrapper,
            steps,
            start,
            options,
        }
    },
    props:{
        users: {
            type: Object,
            required: true,
            default: []
        },
        created_this_week: {
            type: String,
            required: true,
            default: '0'
        },
        created_today: {
            type: String,
            required: true,
            default: '0'
        },
        date: {
            type: String,
            required: true,
            default: '0'
        },
        chart_information : {
            type: Object,
            required: true,
            default: []
        }
    },
    computed: {
        statsObject(){
           return [
                {
                    title: 'Total de usuarios',
                    value: this.users.length,
                    description: "Total de usuarios registrados"
                },
                {
                    title: 'Usuarios creados: hoy',
                    value: this.created_today,
                    description: "Total de usuarios creados este día"
                },
                {
                    title: 'Usuarios creados: esta semana',
                    value: this.created_this_week,
                    description: "Total de usuarios creados esta semana"
                }
           ]
        },
        labels(){
            return this.chart_information.map(item => item.date);
        },
        totals(){
            return this.chart_information.map(item => item.total);
        }
    },
    mounted(){
        this.start();
        console.log(this.date)
    }
}
</script>

<style>

</style>