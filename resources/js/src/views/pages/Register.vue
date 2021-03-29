<!-- =========================================================================================
File Name: RegisterJWT.vue
Description: Register Page for JWT
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
                  <h4 class="mb-4">Register</h4>
                  <p>Create, your free Account here</p>
                </div>

                <div>
                  <vs-input
                      v-validate="'required|alpha'"
                      data-vv-validate-on="blur"
                      name="firstname"
                      icon-no-border
                      icon="icon icon-user"
                      icon-pack="feather"
                      label-placeholder="firstname"
                      v-model="Firstname"
                      class="w-full"/>

                  <vs-input
                      v-validate="'required|alpha'"
                      type="text"
                      data-vv-validate-on="blur"
                      name="lastname"
                      icon-no-border
                      icon="icon icon-user"
                      icon-pack="feather"
                      label-placeholder="lastname"
                      v-model="Firstname"
                      class="w-full"/>

                  <vs-input
                      v-validate="'required|numeric'"
                      data-vv-validate-on="blur"
                      name="phone"
                      icon-no-border
                      icon="icon icon-phone"
                      icon-pack="feather"
                      label-placeholder="phone"
                      v-model="Phone"
                      class="w-full"/>

                  <vs-input
                      ref="password"
                      type="password"
                      name="password"
                      icon-no-border
                      icon="icon icon-lock"
                      icon-pack="feather"
                      label-placeholder="Password"
                      v-model="password"
                      class="w-full mt-6" />

                  <vs-input
                      type="password"
                      name="confirm_password"
                      icon-no-border
                      data-vv-validate-on="blur"
                      data-vv-as="password"   
                      icon="icon icon-lock"
                      icon-pack="feather"
                      label-placeholder="Confirm Password"
                      v-model="confirm_password"
                      class="w-full mt-6" />

                  <div class="flex flex-wrap justify-between my-5">
                <router-link to="">Forgot Password?</router-link>
                  <vs-button class="float-right"  @click="registerUser">Register</vs-button>
                  </div>
                  <vs-button  type="border">Login</vs-button>
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
export default {
  data () {
    return {
      displayName: '',
      email: '',
      password: '',
      confirm_password: '',
      isTermsConditionAccepted: true
    }
  },
  computed: {
    validateForm () {
      return !this.errors.any() && this.displayName !== '' && this.email !== '' && this.password !== '' && this.confirm_password !== '' && this.isTermsConditionAccepted === true
    }
  },
  methods: {
    checkLogin () {
      // If user is already logged in notify
      if (this.$store.state.auth.isUserLoggedIn()) {

        // Close animation if passed as payload
        // this.$vs.loading.close()

        this.$vs.notify({
          title: 'Login Attempt',
          text: 'You are already logged in!',
          iconPack: 'feather',
          icon: 'icon-alert-circle',
          color: 'warning'
        })

        return false
      }
      return true
    },
    registerUserJWt () {
      // If form is not validated or user is already login return
      if (!this.validateForm || !this.checkLogin()) return

      const payload = {
        userDetails: {
          displayName: this.displayName,
          email: this.email,
          password: this.password,
          confirmPassword: this.confirm_password
        },
        notify: this.$vs.notify
      }
      this.$store.dispatch('auth/registerUserJWT', payload)
    }
  }
}
</script>
