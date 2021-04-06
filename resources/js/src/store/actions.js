/*=========================================================================================
  File Name: actions.js
  Description: Vuex Store - actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import jwt from '../http/requests/auth/jwt/index.js'

const actions = {

  // /////////////////////////////////////////////
  // COMPONENTS
  // /////////////////////////////////////////////

  // Vertical NavMenu
  updateVerticalNavMenuWidth ({ commit }, width) {
    commit('UPDATE_VERTICAL_NAV_MENU_WIDTH', width)
  },

  // VxAutoSuggest
  updateStarredPage ({ commit }, payload) {
    commit('UPDATE_STARRED_PAGE', payload)
  },

  // The Navbar
  arrangeStarredPagesLimited ({ commit }, list) {
    commit('ARRANGE_STARRED_PAGES_LIMITED', list)
  },
  arrangeStarredPagesMore ({ commit }, list) {
    commit('ARRANGE_STARRED_PAGES_MORE', list)
  },

  // /////////////////////////////////////////////
  // UI
  // /////////////////////////////////////////////

  toggleContentOverlay ({ commit }) {
    commit('TOGGLE_CONTENT_OVERLAY')
  },
  updateTheme ({ commit }, val) {
    commit('UPDATE_THEME', val)
  },

  // /////////////////////////////////////////////
  // User/Account
  // /////////////////////////////////////////////

  updateUserInfo ({ commit }, payload) {
    commit('UPDATE_USER_INFO', payload)
  },
  login ({ commit }, payload) {
    console.log("actions.js");
    return new Promise((resolve, reject) => {
      jwt.login(payload.userDetails.phone, payload.userDetails.password)
        .then(response => {

          // If there's user data in response
          if (response.data.userData) {
            // Navigate User to homepage
            router.push(router.currentRoute.query.to || '/')

            // Set accessToken
            localStorage.setItem('accessToken', response.data.accessToken)

            // Update user details
            commit('UPDATE_USER_INFO', response.data.userData, {root: true})

            // Set bearer token in axios
            commit('SET_BEARER', response.data.accessToken)

            resolve(response)
          } else {
            reject({message: 'Wrong Phone or Password'})
          }

        })
        .catch(error => { reject(error) })
    })
  },
  registerUserJWT ({ commit }, payload) {
    console.log("actions.js");
    const { firstName, lastName, phone, password, confirmPassword } = payload.userDetails

    return new Promise((resolve, reject) => {

      // Check confirm password
      if (password !== confirmPassword) {
        reject({message: 'Password doesn\'t match. Please try again.'})
      }

      jwt.registerUser(firstName, lastName, phone, password)
        .then(response => {
          // Redirect User
          router.push(router.currentRoute.query.to || '/')

          // Update data in localStorage
          localStorage.setItem('accessToken', response.data.accessToken)
          commit('UPDATE_USER_INFO', response.data.userData, {root: true})

          resolve(response)
        })
        .catch(error => { reject(error) })
    })
  }
}

export default actions 
