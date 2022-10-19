import router from '@/router/router';
import axios from 'axios';

export default {
    async getSeverityList(store) {
        const {data} = await axios.get('/api/task-severities-list')
        store.commit('setSeverityList', data.result)
    },
   async getUserTasks(store) {
       const {data} = await axios.get('/api/task')
       store.commit('setTasks', data.result)
    },
    createTask(context, payload) {
        axios.post('/api/task', payload)
            .then(response => {
                context.dispatch('successHandler', response)
            })
            .catch(error => {
                context.dispatch('errorsHandler', error)
            })
    },
    updateTask(context, payload) {
        axios.put(`/api/task/${payload.taskId}`, payload)
            .then(response => {
                context.dispatch('successHandler', response)
            })
            .catch(error => {
                context.dispatch('errorsHandler', error)
            })
    },
    deleteTask(context, payload) {
        axios.delete(`/api/task/${payload}`)
            .then(response => {
                context.dispatch('successHandler', response)
            })
            .catch(error => {
                context.dispatch('errorsHandler', error)
            })
    },
    getTask(store, payload){
        return axios.get(`/api/task/${payload}`)
    },
    successHandler(context, payload){
        context.commit('setSuccessMessage', payload.data.message );
        setTimeout( () => {
            context.commit('setSuccessMessage', '' );
            router.push({ name: 'dashboard'})
        }, 2000 )
    },
    errorsHandler(context, payload){
        console.log( payload );
        console.log( payload.response );
        console.log( payload.response.data );
        context.commit('setErrorsMessage', payload.response.data.errors)
        setTimeout(() => context.commit('setErrorsMessage', []), 2000)
    }
}
