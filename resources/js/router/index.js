import Vue from 'vue'
import Router from 'vue-router'
import Index from '../pages/Index'

/* Route module */
import LoginRoute from './routes/login.js'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    routes: [
        LoginRoute,
        {
            path: '/',
            name: 'Index',
            component: Index,
            redirect: '/login'
        },
    ],
})

export default router
