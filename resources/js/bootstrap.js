window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;   
	//window.scrollbar = require('./plugins/perfect-scrollbar.min.js').default;
    window.$ = window.jQuery = require('jquery');
	
    window.scriptmin = require('./plugins/script.min.js').default;    
    window.sidebar = require('./plugins/sidebar.large.script.min.js').default;
    window.sweetalert2 = require('./plugins/sweetalert2.js').default;
    window.dropzone = require('./plugins/stand-alone-button.js').default;
    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
       // console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }

    //add basic api token for requests
		let api_token = document.head.querySelector('meta[name="api-token"]');
		let loggedIn = window.localStorage.getItem('loggedIn');
    if (loggedIn) {

        window.authIsLoggedIn = true;


    } else {

        window.authIsLoggedIn = false;

    }
	// validate.js
    window.validate = require('validate.js');
/**
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
