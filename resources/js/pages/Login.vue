<template>
    <div class="login-box">
        <div class="login-logo">
            <b>lut</b>kan
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form @submit.prevent="validateBeforeSubmit">
                    <div class="form-group has-feedback" :class="{'has-error': errors.has('Login email')}">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="email"
                            id="login_email"
                            name="Login email"
                            v-validate="'required|email'"
                            v-model="inputData.login_email"
                        >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span v-show="errors.has('Login email')" :class="{'help-block': errors.has('Login email')}">
                            {{ errors.first('Login email') }}
                        </span>
                    </div>
                    <div class="form-group has-feedback" :class="{'has-error': errors.has('Login password')}">
                        <input
                            type="password"
                            class="form-control"
                            id="login_pw"
                            name="Login password"
                            v-validate="'required|min:3|max:100'"
                            v-model="inputData.login_pw"
                        >
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <span v-show="errors.has('Login password')" :class="{'help-block': errors.has('Login password') }">
                            {{ errors.first('Login password') }}
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember_me">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btnLogin">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</template>

<script>

    import {mapActions} from 'vuex'

    export default {
        name: "Login",

        data() {
            return {
                inputData: {
                    login_email: null,
                    login_pw: null,
                },
                isShow: false,
            }
        },

        methods: {
            ...mapActions('auth', ['login']),

            async handleSubmit() {
                let data = {...this.inputData}
                this.isShow = true
                try {
                    await this.login(data).then(() => {
                        this.isShow = false
                        this.$router.push({name: 'Home'})
                    })
                } catch (e) {
                    this.isShow = false
                    this.$message.error(e.response.data.error.message)
                }
            },

            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) this.handleSubmit()
                })
            },
        }
    }
</script>
