<template>
<div>
  <router-link v-if="accessToken" :to="{name: 'fruit.index'}">List</router-link>
  <router-link v-if="!accessToken" :to="{name: 'user.login'}">Login</router-link>
  <router-link v-if="!accessToken" :to="{name: 'user.registration'}">Registration</router-link>
  <router-link v-if="accessToken" :to="{name: 'user.personal'}">Personal</router-link>
  <router-view></router-view>
</div>
</template>

<script>
export default {
  name: "Index",

  data() {
    return{
      accessToken: null
    }
  },

  mounted() {
    this.getAccessToken()
  },

  updated(){
    this.getAccessToken()
  },

  methods:{
    getAccessToken(){
      this.accessToken = localStorage.getItem('access_token')
    }
  }

}
</script>

<style scoped>

</style>