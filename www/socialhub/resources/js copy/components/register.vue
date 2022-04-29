<template>
  <div>
    <h1>Register</h1>
    <div>
      <label for="name">Name</label>
      <input type="text" v-model="user.name" />
    </div>
    <div>
      <label for="email">Email</label>
      <input type="text" v-model="user.email" />
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" v-model="user.password" />
    </div>
    <div>
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" v-model="user.password_confirmation" />
    </div>
    <button @click="register()">Register</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
    };
  },

  methods: {
    register() {
      console.log(this.user);
      this.axios
        .post("/api/register", this.user)
        .then(({ data }) => {
          this.$router.push("/login");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
