<template>
    <div class="stats shadow w-full">
    
        <div class="stat place-items-center" v-for="(item, index) in stats" :key="index">
            <div class="stat-title text-lg font-bold">{{ item.title }}</div>
            <div class="stat-value">{{  item.value  }}</div>
            <div class="stat-desc font-bold">{{ item.description }}</div>
        </div>
    
    </div>
</template>

<script>
export default {
    props: {
        stats: {
            type: Object,
            required: true,
            default: []
        }
    }
}
</script>

<style>

</style>