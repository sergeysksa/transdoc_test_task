export default {
    formErrors: (state) => {
        const errorsList = []
           Object.values(state.taskFormErrors).forEach(error => {
               errorsList.push(error[0]);
           })
        return errorsList
    },
}


