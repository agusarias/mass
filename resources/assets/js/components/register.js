/**
 * Register all the components.
 */

/**
 * Third party components
 */
Vue.use(require('vue-quill-editor'))

/**
 * Common components
 */
Vue.component('app-csrf', require('./common/CSRF.vue'));
Vue.component('app-container', require('./common/Container.vue'));
Vue.component('app-button', require('./common/Button.vue'));



/**
 * Navigation components
 */
Vue.component('application-wrapper', require('./navigation/ApplicationWrapper.vue'));
Vue.component('user-menu', require('./navigation/UserMenu.vue'));


/**
 * Auth components
 */
Vue.component('login-form', require('./auth/LoginForm.vue'));


/**
 * Sections
 */
Vue.component('section-posts', require('./admin/posts/Index.vue'));
Vue.component('section-post', require('./admin/post/Index.vue'));