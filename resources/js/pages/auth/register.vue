<template>
  <div class="row register">
    <div class="container">
      <div class="col-12">
        <div class="row">
          <div class="col-7">
            <div class="col-5" style="margin-top: 350px; color:white;">
              <div class="head">
                <h1 style="font-size: 60px">
                  MINDMUSE
                  <hr class="mindmuse" />
                </h1>
                <h5>เราคือนักพัฒนาและจัดการ</h5>
                <h3>" ข้อมูลพิพิธภัณฑ์ "</h3>
              </div>
            </div>
          </div>
          <div class="col-5">
            <div class="form-login">
              <div class="content">
                <i class="icon">icon</i>
                <h1>REGISTER</h1>
                <i>Already an have account ?</i>
                <router-link to="/">
                  <a>
                    <span>SIGN IN</span>
                  </a>
                </router-link>
                <hr style="height:1px; border-color:#1EC1B5; background-color:#1EC1B5" />
                <form @submit.prevent="register" @keydown="form.onKeydown($event)">
                  <!-- Name -->
                  <div class="form-group">
                    <input
                      placeholder="Name"
                      id="input"
                      v-model="form.name"
                      :class="{ 'is-invalid': form.errors.has('name') }"
                      class="form-control"
                      type="text"
                      name="name"
                      width="100%"
                    />
                    <has-error :form="form" field="name" />
                  </div>

                  <!-- Email -->
                  <div class="form-group">
                    <input
                      placeholder="Email"
                      id="input"
                      v-model="form.email"
                      :class="{ 'is-invalid': form.errors.has('email') }"
                      class="form-control"
                      type="email"
                      name="email"
                      width="100%"
                    />
                    <has-error :form="form" field="email" />
                  </div>

                  <!-- Password -->
                  <div class="form-group">
                    <input
                      id="input"
                      placeholder="Password"
                      v-model="form.password"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                      class="form-control"
                      type="password"
                      name="password"
                      width="100%"
                    />
                    <has-error :form="form" field="password" />
                  </div>

                  <!-- Password Confirmation -->
                  <div class="form-group">
                    <input
                      placeholder="Re-password"
                      id="input"
                      v-model="form.password_confirmation"
                      :class="{
                  'is-invalid': form.errors.has('password_confirmation')
                }"
                      class="form-control"
                      type="password"
                      name="password_confirmation"
                      width="100%"
                    />
                    <has-error :form="form" field="password_confirmation" />
                  </div>

                  <div class="form-group">
                    <!-- Submit Button -->
                    <v-button :loading="form.busy" id="input2">{{ $t("register") }}</v-button>

                    <!-- GitHub Register Button -->
                    <login-with-github />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    return { title: this.$t("register") };
  },

  data: () => ({
    form: new Form({
      name: "",
      email: "",
      password: "",
      password_confirmation: ""
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register() {
      // Register the user.
      const { data } = await this.form.post("/api/register");

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true;
      } else {
        // Log in the user.
        const {
          data: { token }
        } = await this.form.post("/api/login");

        // Save the token.
        this.$store.dispatch("auth/saveToken", { token });

        // Update the user.
        await this.$store.dispatch("auth/updateUser", { user: data });

        // Redirect home.
        if (this.user.role == 1) {
          this.$router.push({ name: "admin.museums" });
        } else if (this.user.role == 2) {
          this.$router.push({ name: "customer.museums" });
        } else {
          this.$router.push({ name: "home" });
        }
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.register {
  background-image: url(https://sv1.picz.in.th/images/2020/01/06/RN9kyq.png);
  height: 1080px;
}
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
  border-radius: 10px;
  margin-bottom: 10px;
  // background-image: url(https://image.flaticon.com/icons/png/512/481/481659.png);
  background-position: 0 50%;
  background-repeat: no-repeat;
  text-indent: 30px;
}
#input2 {
  background-color: #ff6464;
  border-radius: 10px;
  width: 100%;
  border-color: #ffffff;
}
.form-login {
  margin-top: 120px;
  background-color: white;
  padding: 100px 100px 40px 100px;

  border-radius: 30px;
}
.mindmuse {
  height: 1px;
  background-color: #ffcc57;
}
</style>
