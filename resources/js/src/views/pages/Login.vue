<!-- =========================================================================================
    File Name: Login.vue
    Description: Login Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
  <div class="h-screen flex w-full bg-img vx-row no-gutter items-center justify-center" id="page-login">
    <div class="vx-col sm:w-1/2 md:w-1/2 lg:w-3/4 xl:w-3/5 sm:m-0 m-4">
      <vx-card>
        <div slot="no-body" class="full-page-bg-color">

          <div class="vx-row no-gutter justify-center items-center">

            <div class="vx-col hidden lg:block lg:w-1/2">
              <img src="@assets/images/pages/login.png" alt="login" class="mx-auto">
            </div>

            <div class="vx-col sm:w-full md:w-full lg:w-1/2 d-theme-dark-bg">
              <div class="p-8 login-tabs-container">

                <div class="vx-card__title mb-4">
                  <h4 class="mb-4">Login</h4>
                  <p>Welcome back, please login to your account.</p>
                </div>

                <div>
                  <vs-input
                      v-validate="'required|numeric'"
                      data-vv-validate-on="blur"
                      name="phone"
                      icon-no-border
                      icon="icon icon-phone"
                      icon-pack="feather"
                      label-placeholder="Phone"
                      v-model="phone"
                      class="w-full"/>

                  <vs-input
                      type="password"
                      name="password"
                      icon-no-border
                      icon="icon icon-lock"
                      icon-pack="feather"
                      label-placeholder="Password"
                      v-model="password"
                      class="w-full mt-6" />

                  <div class="flex flex-wrap justify-between my-5">
                      <vs-checkbox v-model="checkbox_remember_me" class="mb-3">Remember Me</vs-checkbox>
                      <router-link to="">Forgot Password?</router-link>
                  </div>
                  <vs-button class="float-right"  @click="loginUser">Login</vs-button>
                  <vs-button class="float-right"  @click="registerUser">Register</vs-button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </vx-card>
    </div>
  </div>
</template>

<script>
export default{
  data () {
    return {
      phone: '',
      password: '',
      checkbox_remember_me: false
    }
  },
  methods: {
    registerUser () {
      if (!this.checkLogin()) return
      this.$router.push('/pages/register').catch(() => {})
    },
      loginUser() {
      // If form is not validated or user is already login return
         console.log("loginUser1");
      // if (!this.validateForm || !this.checkLogin()) 
      // return
      console.log("loginUser2");
      const payload = {
        userDetails: {
          phone: this.phone,
          password: this.password,
        },
        notify: this.$vs.notify
      }
      this.$store.dispatch('login', payload)
      console.log("loginUser3");
    }
  }
}


</script>

<style lang="scss">
#page-login {
  .social-login-buttons {
    .bg-facebook { background-color: #1551b1 }
    .bg-twitter { background-color: #00aaff }
    .bg-google { background-color: #4285F4 }
    .bg-github { background-color: #333 }
  }
}
</style>
