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
                    <div class="form-group has-feedback" :class="{'has-error': errors.has('email')}">
                        <input
                            type="text"
                            :class="{'form-control': true, 'is-danger': errors.has('email') }"
                            placeholder="email@exaple.com"
                            id="login_email"
                            name="email"
                            v-validate="'required|email'"
                            v-model="inputData.email"
                        >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span v-show="errors.has('email')" :class="{'is-danger': errors.has('email')}">
                            {{ errors.first('email') }}
                        </span>
                    </div>
                    <div class="form-group has-feedback" :class="{'has-error': errors.has('password')}">
                        <input
                            type="password"
                            :class="{'form-control': true, 'is-danger': errors.has('password') }"
                            placeholder="Please input password"
                            id="login_pw"
                            name="password"
                            v-validate="'required|min:3|max:100'"
                            v-model="inputData.password"
                        >
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <span v-show="errors.has('password')" :class="{'text-danger': errors.has('password') }">
                            {{ errors.first('password') }}
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
        <!-- /.login-box-body -->
        <div class="overlay" :class="{show: isShow}">
            <img src="images/loading.gif" alt="loading">
        </div>
    </div>
</template>

<script>

    import {mapActions} from 'vuex'

    export default {
        name: "Login",
        created() {
            document.body.className = "login-page"
        },
        data() {
            return {
                inputData: {
                    email: null,
                    password: null,
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
