<template>
    <md-layout md-align="center">

        <md-whiteframe class="wrapper" md-elevation="10"
                       md-flex-small="80" md-flex-offset-small="10"
                       md-flex="33" md-flex-offset="33">

            <md-layout md-gutter md-column>
                <md-layout md-gutter>
                    <h2 class="md-title">Login</h2>
                </md-layout>

                <md-layout md-gutter>
                    <form ref="form" role="form" class="form" method="POST" :action="routeLogin">
                        <csrf></csrf>
                        <md-input-container :class="{'md-input-invalid': errorEmail}">
                            <label>E-Mail Address</label>
                            <md-input required v-model="email" name="email"></md-input>
                            <span class="md-error" v-if="errorEmail">{{ errorEmail }}</span>
                        </md-input-container>

                        <md-input-container :class="{'md-input-invalid': errorEmail}">
                            <label>Password</label>
                            <md-input required v-model="password" name="password" type="password"></md-input>
                            <span class="md-error" v-if="errorPassword">{{ errorPassword }}</span>
                        </md-input-container>

                        <md-checkbox name="remember" v-model="remember">Remember Me</md-checkbox>
                    </form>
                </md-layout>

                <md-layout md-gutter>
                    <md-button :href="routeRequest" class="md-caption md-dense">Forgot Your Password?</md-button>
                    <md-button class="md-raised md-primary js-login-button" @click.native="login">Login</md-button>
                </md-layout>
            </md-layout>
        </md-whiteframe>

    </md-layout>
</template>

<script>
    export default {
        props: {
            routeLogin: String,
            routeRequest: String,
            errorEmail: String,
            errorPassword: String,
            oldEmail: String,
            oldRemember: String
        },
        data: function () {
            return {
                email: this.oldEmail,
                password: '',
                remember: this.oldRemember,
            }
        },
        methods: {
            login: function () {
                this.$refs.form.submit();
            }
        }
    }
</script>

<style>
    .wrapper {
        margin-top: 40px;
        padding: 20px;
    }
    .form{
        width: 100%;
    }
</style>