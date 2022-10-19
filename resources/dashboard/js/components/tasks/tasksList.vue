<template>
    <section>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTaskModal">
            Create Task
        </button>

        <ul
            v-if="userTasks.length"
            class="my-4 list-group"
        >
            <task-list-item v-for="(task, index) in userTasks"
                :key="index"
                :taskItem="task"
            >
            </task-list-item>
        </ul>
        <p v-else>You haven't tasks yet!</p>
        <create-task-modal />
    </section>
</template>

<script setup>
import {computed, onMounted} from "vue";
import { Modal } from 'bootstrap'
import { useStore } from 'vuex'
import TaskListItem from "@/components/tasks/taskListItem";
import CreateTaskModal from "@/components/tasks/createTaskModal";

const store = useStore()
onMounted(() => {
    store.dispatch('tasks/getUserTasks')
})
const userTasks = computed(() => store.state.tasks.tasks)

</script>

<style scoped>

</style>
