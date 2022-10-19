import axios from "axios";
import store from '@/store'

axios.interceptors.response.use(
    (response) => response,
    (error) => {
        // Handle error
        if(error?.response?.status === 500) {
            console.log( 'ERROR:', error?.response.data.message );
            console.log('Application unavailable. Please try again later.')
        }

        return Promise.reject(error)
    }
)
