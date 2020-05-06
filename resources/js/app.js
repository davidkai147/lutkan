import './bootstrap'

import Vue from 'vue'
import router from './router'
import store from './store'

window.Vue = Vue

import App from './App.vue'

// import VeeValidate
import va_en from './locale/validate_en'
import VeeValidate, {Validator} from 'vee-validate'

Vue.use(VeeValidate, {classNames: 'text-bold', fieldsBagName: 'text-bold'})
Validator.localize('en', va_en)
// End VeeValidate

// Import ElementUI
import ElementUI from 'element-ui'
import el_en from 'element-ui/lib/locale/lang/en'
import {AuthService} from './api'
import {Cookie} from './util/cookie'

Vue.use(ElementUI, {locale: el_en})
// End ElementUI

Vue.config.productionTip = false
Vue.component('App', App)

router.beforeEach((to, from, next) => {
    const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title)
    // If a route with a title was found, set the document (page) title to that value.
    if (nearestWithTitle) document.title = nearestWithTitle.meta.title
    if (to.matched.some(record => record.meta.requiredAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (Cookie.findByName('access_token')) {
            // Exist cookie
            if (!store.getters['auth/currentUser'].name) {
                store.dispatch('auth/checkAuth').then(() => {
                    //if (_.indexOf(to.meta.permission, Cookie.findByName('type')) !== -1) {
                        next()
                    // } else {
                    ////     next('/login')
                    // }
                })
            } else {
                next({name: 'PageNotFound'})
            }
        } else {
            // Not exist cookie access_token
            window.location.href = window.location.origin + '/login'
        }
    } else {
        if (to.name === 'Login' && Cookie.findByName('access_token')) {
            next({name: 'Home'})
        } else {
            next()
        }
    }
})

const app = new Vue({
    el: '#app',
    router,
    store,
})
