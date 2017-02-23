<template>
    <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" :action="routeLogin">
                <csrf></csrf>

                <div :class="[{ 'has-errors': errorEmail }, 'form-group']">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" v-model="email" required autofocus>

                        <span class="help-block" v-if="errorEmail">
                            <strong>{{ errorEmail }}</strong>
                        </span>
                    </div>
                </div>

                <div :class="[{ 'has-errors': errorPassword }, 'form-group']">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" v-model="password" required>

                        <span class="help-block" v-if="errorPassword">
                            <strong>{{ errorPassword }}</strong>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" v-model="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" :href="routeRequest">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
        data: function(){
            return {
                email: this.oldEmail,
                password: this.oldPassword,
                remember: this.oldRemember,
            }
        },
    }
</script>

<style>

</style>