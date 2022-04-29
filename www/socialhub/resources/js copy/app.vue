<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <div class="navbar-nav" v-if="loggedUser">
          <h5>Dashboard</h5>
          <a href="javascript:void(0)" @click="logout()" class="nav-item nav-link ml-3"
            >Logout</a
          >
        </div>
        <div v-else>
          <router-link to="/login">Login</router-link>
          <router-link to="/register">Register</router-link>
        </div>
      </div>
    </nav>
    <router-view> </router-view>
  </div>
</template>

<script>
import Auth from "./Auth.js";
export default {
  data() {
    return {
      loggedUser: this.auth.user,
    };
  },
  mounted() {
    console.log(this.auth.user);
  },
  methods: {
    logout() {
      this.axios
        .post("/api/logout")
        .then(({ data }) => {
          Auth.logout(); //reset local storage
          this.$router.push("/login");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
