import axios from 'axios';

let apiURL: string = import.meta.env.VITE_API_URL;

export async function listUsersService(page?: number, perPage: number = 15) {
    if (!page) {
        page = 1;
    }

    return axios.get(`${apiURL}/user?perPage=${perPage}&page=${page}`);
}

export async function getUserService(id: any) {
    return axios.get(`${apiURL}/user/${id}`);
}
