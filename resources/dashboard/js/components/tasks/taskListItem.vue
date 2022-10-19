<template>
    <li
        @click="viewTask(taskItem.id)"
        class="d-flex list-group-item list-group-item-action cursor-pointer">
        <span>{{taskItem.name}}</span>
    </li>
</template>

<script setup>
import {defineProps} from 'vue'
import router from "@/router/router";

defineProps({
    taskItem: {},
})

const viewTask = (taskId) => router.push({name: 'taskEdit', params:{id: taskId}})

</script>

<style scoped lang="scss">
.cursor-pointer{
    cursor: pointer;
}
.remove-icon{
    color: red;
}
</style>
