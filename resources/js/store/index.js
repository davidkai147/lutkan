import Vuex from 'vuex'
import Vue from 'vue'

// import modules
import common from './modules/common'
import auth from './modules/auth'

Vue.use(Vuex)

const modules = {
    common,
    auth,
}

const state = {}

const getters = {}

const mutations = {}

const actions = {}

export default new Vuex.Store({
    modules,
    state,
    getters,
    mutations,
    actions,
})
