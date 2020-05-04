import {ApiService} from '../api.service.js'

import {Cookie} from '../../util/cookie'

export const AuthService = {

    fetchUser() {
        return ApiService.post('users/me?with=contract').then(
            (resp) => {
                const {data} = resp.data;
                return data;
            }
        );
    },

    switchUser(data) {
        return ApiService.post('users/switch_user', {index: data});
    },

    logout() {
        let token = document.head.querySelector('meta[name="csrf-token"]')
        const body = new FormData()
        body.append('_token', token.content)
        let config = {}
        config.baseURL = '/'
        config.headers = {}
        if (Cookie.findByName('access_token')) {
            config.headers['Authorization'] = `${Cookie.findByName('access_token')}`
        }
        if (localStorage.getItem('current-route')) {
            localStorage.removeItem('current-route')
        }
        return ApiService.post('api/users/logout', body, config)
    },

}
