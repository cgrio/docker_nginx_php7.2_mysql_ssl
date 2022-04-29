<template>
  <div>
    <h1>Login</h1>
    <div>
      <label for="email">Email</label>
      <input type="email" v-model="user.email" />
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" v-model="user.password" />
    </div>
    <button @click="login">Login</button>
  </div>
</template>

<script>
import Auth from "../Auth.js";

export default {
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
    };
  },

  methods: {
    login() {
      this.axios
        .post("/api/login", this.user)
        .then(({ data }) => {
          Auth.login(data.access_token, data.user); //set local storage
          this.$router.push("/dashboard");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
