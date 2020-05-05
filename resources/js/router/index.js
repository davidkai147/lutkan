import Vue from 'vue'
import Router from 'vue-router'
import Index from '../pages/Index'

/* Route module */
import LoginRoute from './routes/login.js'
import HomeRoute from './routes/home.js'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    routes: [
        LoginRoute,
        {
            path: '/',
            name: 'Index',
            component: Index,
            redirect: '/login',
            children: [
                HomeRoute
            ]
        },
    ],
})

export default router
