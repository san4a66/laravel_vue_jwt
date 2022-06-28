import axios from "axios";
import router from "./router";


const api = axios.create();

    //start request

    api.interceptors.request.use(config => {

        if (localStorage.getItem('access_token')) {

            config.headers = {

                'authorization': `Bearer ${localStorage.getItem('access_token')}`
            }
            return config
        }

    }, error => {

    })


    //end request


    api.interceptors.response.use(
        config => {
            if (localStorage.getItem('access_token')) {

                config.headers = {

                    'authorization': `Bearer ${localStorage.getItem('access_token')}`
                }
                return config
            }
        },

        error => {
            if (typeof error.response === "undefined" || error.response.status === 401) {
                router.push({name: 'user.login'})
            }
        })

export default api
