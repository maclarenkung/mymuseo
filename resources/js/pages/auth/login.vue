<template>
  <div class="row">
    <div class="col col-12 col-md-8" id="frame-login">
      <h1>WELCOME TO MINDMUSE</h1>
      <router-link to="/register" class="btn">
        <button class="button1">SIGN UP</button>
      </router-link>
    </div>
    <div class="col col-12 col-md-4" id="frame-login2">
      <h1>LOGIN</h1>

      <form @submit.prevent="login" @keydown="form.onKeydown($event)">
        <!-- Email -->
        <div class="form-group row">
          <div class="col-md-8 offset-md-2 d-flex">
            <input
              placeholder="Email"
              id="input"
              v-model="form.email"
              :class="{ 'is-invalid': form.errors.has('email') }"
              class="form-control"
              type="email"
              name="email"
            />
            <has-error :form="form" field="email" />
          </div>
        </div>

        <!-- Password -->
        <div class="form-group row">
          <div class="col-md-8 offset-md-2 d-flex">
            <input
              id="input"
              placeholder="Password"
              v-model="form.password"
              :class="{ 'is-invalid': form.errors.has('password') }"
              class="form-control"
              type="password"
              name="password"
            />
            <has-error :form="form" field="password" />
          </div>
        </div>

        <!-- Remember Me -->
        <!-- <div class="form-group row">
              <div class="col-md-3" />
              <div class="col-md-7 d-flex">
                <checkbox v-model="remember" name="remember">{{ $t("remember_me") }}</checkbox>

                <router-link
                  :to="{ name: 'password.request' }"
                  class="small ml-auto my-auto"
                >{{ $t("forgot_password") }}</router-link>
              </div>
        </div>-->

        <div class="form-group row">
          <div class="col-md-8 offset-md-2 d-flex">
            <!-- Submit Button -->
            <v-button :loading="form.busy" id="input2">{{ $t("login") }}</v-button>

            <!-- GitHub Login Button -->
            <login-with-github />
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import LoginWithGithub from "~/components/LoginWithGithub";

export default {
  middleware: "guest",

  components: {
    LoginWithGithub
  },

  metaInfo() {
    return { title: this.$t("login") };
  },

  data: () => ({
    form: new Form({
      email: "",
      password: ""
    }),
    remember: false
  }),

  methods: {
    async login() {
      // Submit the form.
      const { data } = await this.form.post("/api/login");

      // Save the token.
      this.$store.dispatch("auth/saveToken", {
        token: data.token,
        remember: this.remember
      });

      // Fetch the user.
      await this.$store.dispatch("auth/fetchUser");

      // Redirect home.
      if (this.user.role == 1) {
        this.$router.push({ name: "admin.museums" });
      } else if (this.user.role == 2) {
        this.$router.push({ name: "admin.muse.dashboard" });
      } else {
        this.$router.push({ name: "home" });
      }
    }
  }
};
</script>
<style lang="scss" scoped>
#frame-login {
  height: 750px;
  background-color: #1a69e4;
}
#frame-login2 {
  height: 750px;
  background-color: white;
}
#frame-login h1 {
  margin-left: 10%;
  bottom: 40%;
  position: absolute;
  color: white;
}
#frame-login button {
  width: 120px;
  margin-left: 10%;
  bottom: 10%;
  position: absolute;
  color: white;
}
.button1 {
  border-radius: 99px;
  border-color: white;
  background-color: #1a69e4;
}
#frame-login2 h1 {
  text-align: center;
  margin-top: 20%;
  color: black;
  margin-bottom: 40px;
}
#input {
  border-radius: 99px;
  margin-bottom: 10px;
  // background-image: url(https://image.flaticon.com/icons/png/512/481/481659.png);
  background-position: 0 50%;
  background-repeat: no-repeat;
  text-indent: 30px;
}
#input2 {
  background-color: #305a9a;
  border-radius: 99px;
  width: 100%;
}
</style>

