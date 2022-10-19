<template>
    <div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                v-model="task.name"
                type="text"
                class="form-control"
                id="name"
                placeholder="Some task name"
            />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Task description</label>
            <textarea
                v-model="task.description"
                class="form-control"
                id="description"
                rows="3" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Severity</label>
            <vue-select
                v-model="task.severity"
                :options="severityList"
            ></vue-select>
        </div>
    </div>
</template>

<script setup>
import {defineProps, ref, computed, onMounted} from 'vue'
import { useStore } from 'vuex'
import VueSelect from 'vue-next-select'
import 'vue-next-select/dist/index.css'
const store = useStore()

const severityList = computed(() => store.state.tasks.severityList)

defineProps({
    taskId: {
        type: Number
    }
})

const task = ref({
    name: '',
    description: '',
    severity: ''
})

onMounted(() => {
    store.dispatch('tasks/getSeverityList')
})



</script>
<style scoped>

</style>
