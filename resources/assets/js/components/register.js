/**
 * Register all the components.
 */


/**
 * Common components
 */
Vue.component('csrf', require('./common/CSRF.vue'));


/**
 * Navigation components
 */
Vue.component('application-wrapper', require('./navigation/ApplicationWrapper.vue'));
Vue.component('user-menu', require('./navigation/UserMenu.vue'));


/**
 * Auth components
 */
Vue.component('login-form', require('./auth/LoginForm.vue'));