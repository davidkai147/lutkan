<template>
    <!-- Content Wrapper. Contains page content -->
    <div>
        ahihi
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
    import {mapGetters} from 'vuex'
    import store from '../store'

    export default {
        name: 'Home',

        beforeRouteEnter(to, from, next) {
            // if (from.name === 'SignIn') {
            //     store.dispatch('auth/checkAuth').then(() => next())
            // } else {
                 next()
            // }
        },
    }
</script>
