<template>
    <md-layout>
        <md-layout md-align="center"
                   md-flex-small="80" md-flex-offset-small="10"
                   md-flex="33" md-flex-offset="33">

            <md-whiteframe class="wrapper">
                <md-layout md-gutter md-column>

                    <span class="md-title">Login</span>

                    <form ref="form" role="form" method="POST" :action="routeLogin">
                        <csrf></csrf>

                        <md-input-container :class="{'md-input-invalid': errorEmail}">
                            <label>E-Mail Address</label>
                            <md-input required v-model="email" name="email"></md-input>
                            <span class="md-error" v-if="errorEmail">
                                {{ errorEmail }}
                            </span>
                        </md-input-container>

                        <md-input-container :class="{'md-input-invalid': errorEmail}">
                            <label>Password</label>
                            <md-input required v-model="password" name="password" type="password"></md-input>
                            <span class="md-error" v-if="errorPassword">
                                {{ errorPassword }}
                            </span>
                        </md-input-container>

                        <md-checkbox name="remember" v-model="remember">Remember Me</md-checkbox>

                    </form>

                    <md-button class="md-raised md-primary" @click.native="login">Login</md-button>
                    <md-button :href="routeRequest" class="md-caption md-dense">Forgot Your Password?</md-button>

                </md-layout>
            </md-whiteframe>

        </md-layout>
    </md-layout>
</template>

<script>
    export default {
        props: {
            routeLogin: String,
            routeRequest: String,
            csrf: String,
            errorEmail: String,
            errorPassword: String,
            oldEmail: String,
            oldPassword: String,
            oldRemember: String
        },
        data: function () {
            return {
                email: this.oldEmail,
                password: this.oldPassword,
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
</style>