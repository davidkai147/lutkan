window._ = require('lodash');
window.moment = require('moment');
window.axios = require('axios');
let token_csrf = document.head.querySelector('meta[name="csrf-token"]');
let token = localStorage.getItem('token');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
window.axios.defaults.baseURL = 'http://lutkan.com';

window.API = (prefix, params, headers = {}) => {
    window.axios.interceptors.response.use((response) => {
        if (response.data.code === 5) {
            localStorage.setItem('token', response.data.token);
            token = response.data.token;
        }
        if (response.data.code === 6) {
            alert('Vui lòng đăng nhập lại');
        }
        return response;
    }, (error) => {
        // Do something with response error
        return Promise.reject(error);
    });
    return axios.post('/api/' + prefix, params, headers);
};

window.Toast = (title, message, autohide = true, delay = 5000) => {
    $(document).Toasts('create', {
        title: title,
        body: message,
        autohide: autohide,
        delay: delay
    });
};

if (token_csrf) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
