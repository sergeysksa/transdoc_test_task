import { createStore } from 'vuex'
import auth from './auth'
import dashboard from './dashboard'
import tasks from './tasks'

export default createStore({
    modules: {
        auth,
        dashboard,
        tasks
    }
})
