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
import el_ja from 'element-ui/lib/locale/lang/ja'
import {AuthService} from './api'
import {Cookie} from './util/cookie'

Vue.use(ElementUI, {locale: el_ja})
// End ElementUI

Vue.config.productionTip = false
Vue.component('App', App)

router.beforeEach((to, from, next) => {
    const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title)
    // If a route with a title was found, set the document (page) title to that value.
    if (nearestWithTitle) document.title = nearestWithTitle.meta.title
    next()
})

const app = new Vue({
    el: '#app',
    router,
    store,
})
