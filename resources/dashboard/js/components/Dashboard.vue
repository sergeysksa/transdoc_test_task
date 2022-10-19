<template>
    <div>
        <h1>Dashboard</h1>
    </div>
</template>

<script setup>
import {computed, onMounted} from "vue";
import { useStore } from 'vuex'

const store = useStore()
onMounted(() => {
    store.dispatch('dashboard/getUserData')
})
const userData = computed(() => store.state.dashboard.user)

</script>

<style scoped>

</style>
