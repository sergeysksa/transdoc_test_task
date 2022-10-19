import axios from "axios";

export default {
   async getUserData(store) {
       axios.get('api/get-auth-user-data').then(userData => {
           const {data} = userData
           store.commit('setUser', data.user)
       })
    }
}
