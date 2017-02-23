<template>
    <div>
        <template v-if="guest">
            <md-button :href="routeLogin">Login</md-button>
            <md-button :href="routeRegister">Register</md-button>
        </template>
        <template v-else>
            <md-menu md-size="5" :md-offset-x="-100" md-offset-y="0">
                <md-button md-menu-trigger>
                    {{ user }}
                </md-button>

                <md-menu-content>
                    <md-menu-item @selected="logout">
                        <md-icon>user</md-icon>
                        <span>Logout</span>
                    </md-menu-item>

                    <form ref="logoutForm" :action="routeLogout"
                          method="POST" style="display: none;">
                        <csrf></csrf>
                    </form>
                </md-menu-content>
            </md-menu>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            guest: {
                type: Boolean,
                default: false,
            },
            user: String,
            routeLogin: String,
            routeRegister: String,
            routeLogout: String,
        },
        methods: {
            logout: function(){
                this.$refs.logoutForm.submit();
            }
        }
    }
</script>

<style>

</style>