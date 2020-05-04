import {AuthService} from '../../api/service/auth.service'
import {ApiService} from '../../api/api.service'

const state = () => {
    return {
        currentUser: {},
    }
}

const getters = {
    currentUser: state => state.currentUser,
}

const mutations = {
    updateUser(state, payload) {
        state.currentUser = payload
    },
}

const actions = {

    login({commit}, data) {
        try {
            return ApiService.post('users/login', data).then(resp => {
                return resp.data.data
            })
        } catch (e) {
            throw (e)
        }
    },

    checkAuth({commit}) {
        return AuthService.fetchUser().then(
            (data) => {
                commit('updateUser', data)
                return data
            },
        )
    },

}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
}
