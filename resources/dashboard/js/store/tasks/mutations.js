export default {
    setTasks(state, data) {
        state.tasks = data
    },
    setTask(state, data) {
        state.task = data
    },
    setSeverityList(state, data) {
        state.severityList = data
    },
    setSuccessMessage(state, data) {
        state.successMessage = data
    },
    setErrorsMessage(state, data) {
        state.taskFormErrors = data
    }
}
