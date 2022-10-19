import axios from "axios";

export default {
    getToken(){
        return axios.post('/tokens/create')
    }
}
