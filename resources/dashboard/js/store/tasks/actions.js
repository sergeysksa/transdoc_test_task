import axios from "axios";

export default {
    async getSeverityList(store) {
        const {data} = await axios.get('api/task-severities-list')
        store.commit('setSeverityList', data.result)
    },
   async getUserTasks(store) {
       const {data} = await axios.get('api/task')
       store.commit('setTasks', data.result)
    }
}
