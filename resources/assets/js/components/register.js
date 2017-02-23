/**
 * Register all the components.
 */


/**
 * Common components
 */
Vue.component('csrf', require('./common/CSRF.vue'));


/**
 * Auth components
 */
Vue.component('login-form', require('./auth/LoginForm.vue'));


/**
 * Navigation components
 */
Vue.component('user-menu', require('./navigation/UserMenu.vue'));