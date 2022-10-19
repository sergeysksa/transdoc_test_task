<template>
    <section>
        <router-link :to="{ name: 'taskEdit' }"
            type="link"
            class="btn btn-primary"
            v-text="'Create Task'"
        >
        </router-link>
        <ul
            v-if="userTasks.length"
            class="my-4 list-group"
        >
            <task-list-item v-for="(task, index) in userTasks"
                :key="index"
                :taskItem="task"
            />
        </ul>
        <p v-else>You haven't tasks yet!</p>
    </section>
</template>

<script setup>
import {computed, onMounted} from "vue";
import { useStore } from 'vuex'
import TaskListItem from "@/components/tasks/taskListItem";

const store = useStore()
onMounted(() => {
    store.dispatch('tasks/getUserTasks')
})
const userTasks = computed(() => store.state.tasks.tasks)

</script>

<style scoped>

</style>
