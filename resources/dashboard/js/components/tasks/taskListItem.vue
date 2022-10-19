<template>
    <li class="d-flex list-group-item list-group-item-action cursor-pointer justify-content-between align-content-center">
        <span>{{taskItem.name}}</span>
        <span
            @click="removeTask(taskItem.id)"
             class="ml-2 remove-icon"
            >
            x
        </span>
    </li>
</template>

<script setup>
import {defineProps} from 'vue'

defineProps({
    taskItem: {},
})
const removeTask = (taskId) => console.log(taskId)
</script>

<style scoped lang="scss">
.cursor-pointer{
    cursor: pointer;
}
.remove-icon{
    color: red;
}
</style>
