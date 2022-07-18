import axios from 'axios'

class HttpClient {
    constructor(){
        this.axiosInstance = axios.create({
            baseURL:process.env.API_URL
        })
    }
}

export default new HttpClient()