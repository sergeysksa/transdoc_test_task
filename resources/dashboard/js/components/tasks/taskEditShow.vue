<template>
    <div>
        <p class="my-4"><router-link :to="{ name: 'dashboard' }">
            To All tasks
        </router-link></p>

        <ul
            v-if="formErrorsList"
            class="list-group"
        >
            <li v-for="(error, index) in formErrorsList"
                :key="index"
                class="list-group-item list-group-item-danger"
                v-text="error"
            ></li>
        </ul>
        <div
            v-if="successMessage.length"
            v-text="successMessage"
            class="alert alert-success" role="alert"
        >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                v-model="taskObject.name"
                type="text"
                class="form-control"
                id="name"
                placeholder="Some task name"
            />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Task description</label>
            <textarea
                v-model="taskObject.description"
                class="form-control"
                id="description"
                rows="3" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Severity</label>
            <vue-select
                v-model="taskObject.severity"
                :options="severityList"
            ></vue-select>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <button @click="sendTask">Save changes</button>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTaskModal">
                Delete task
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteTaskModal" tabindex="-1" aria-labelledby="deleteTaskModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteTaskModalLabel">Delete task</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you shure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button
                                data-bs-dismiss="modal"
                                data-bs-target="#deleteTaskModal"
                                type="button"
                                class="btn btn-danger"
                                @click="deleteTask"
                            >Delete task</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {defineProps, ref, computed, onMounted} from 'vue'
import { useStore } from 'vuex'
import {useRoute} from 'vue-router'
import VueSelect from 'vue-next-select'
import {Modal} from 'bootstrap'
import 'vue-next-select/dist/index.css'
const store = useStore()
const route = useRoute()

const severityList = computed(() => store.state.tasks.severityList)
const formErrorsList = computed(() => store.getters["tasks/formErrors"])
const successMessage = computed(() => store.state.tasks.successMessage)

defineProps({
    taskId: {
        type: Number
    }
})

const taskObject = ref({
    name: '',
    description: '',
    severity: ''
})

const getTask = (id) => {
    store.dispatch('tasks/getTask', id )
        .then((response) => {
            const {task} = response.data
            taskObject.value.name = task.name
            taskObject.value.description = task.description
            taskObject.value.severity = task.severity
        })
}

onMounted(() => {
    store.dispatch('tasks/getSeverityList')
    if(route.params.id){
        getTask(route.params.id)
    }
})

const sendTask = () => {
    if(route.params.id){
        taskObject.value.taskId = route.params.id
        store.dispatch('tasks/updateTask', taskObject.value )
    }else{
        store.dispatch('tasks/createTask', taskObject.value )
    }
}

const deleteTask = () => store.dispatch('tasks/deleteTask', route.params.id )

</script>
<style scoped>

</style>
