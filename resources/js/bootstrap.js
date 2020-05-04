window._ = require('lodash');

//window.moment = require('moment');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    /* Jquery UI */
    require('admin-lte/plugins/jquery-ui/jquery-ui.min.js');

    /* Resolve conflict in jQuery UI tooltip with Bootstrap tooltip */
    $.widget.bridge('uibutton', $.ui.button);

    /* Bootstrap 4.4.1 */
    require('bootstrap/dist/js/bootstrap.min.js');

    /* AdminLTE App */
    require('admin-lte/dist/js/adminlte.min.js');

    /* App check */
    require('icheck/icheck.min.js');

} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
