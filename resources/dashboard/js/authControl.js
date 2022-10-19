import axios from "axios";
import store from '@/store'

axios.get('auth-check').then((response) => {
    axios.defaults.headers.common['Authorization']  = `Bearer ${response.data.token}`;
    store.commit('auth/setLoggedIn', true)
    store.commit('auth/setUser', response.data.user)
})
