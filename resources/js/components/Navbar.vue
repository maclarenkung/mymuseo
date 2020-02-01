<template>
  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
      <router-link :to="{ name: user ? 'home' : 'home' }" class="navbar-brand">
        <!-- <img src="https://sv1.picz.in.th/images/2019/12/18/i6x4A9.png" />  -->
        <img
          src="https://sv1.picz.in.th/images/2020/01/08/RhJSDt.png"
          alt
          width="30%"
          class="logo-mind"
        />
      </router-link>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarToggler"
        aria-controls="navbarToggler"
        aria-expanded="false"
      >
        <span class="navbar-toggler-icon" />
      </button>

      <div
        id="navbarToggler"
        class="collapse navbar-collapse"
        style="flex-grow: 0; ;"
      >
        <ul class="navbar-nav">
          <!-- <locale-dropdown /> -->
          <li class="nav-item">
            <a class="nav-link" href="/home" style="color:#3E7A63">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color:#3E7A63">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color:#3E7A63">Service</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <!-- Authenticated -->
          <li v-if="user" class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle text-dark"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img
                :src="user.photo_url"
                class="rounded-circle profile-photo mr-1"
              />
              {{ user.name }}
            </a>
            <div class="dropdown-menu">
              <router-link
                :to="{ name: 'settings.profile' }"
                class="dropdown-item pl-3"
              >
                <fa icon="cog" fixed-width />
                {{ $t("settings") }}
              </router-link>

              <div class="dropdown-divider" />
              <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                <fa icon="sign-out-alt" fixed-width />
                {{ $t("logout") }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <li class="nav-item">
              <router-link
                :to="{ name: 'login' }"
                class="nav-link"
                active-class="active"
                >{{ $t("login") }}</router-link
              >
            </li>
            <li class="nav-item">
              <router-link
                :to="{ name: 'register' }"
                class="nav-link"
                active-class="active"
                >{{ $t("register") }}</router-link
              >
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from "vuex";
import LocaleDropdown from "./LocaleDropdown";

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: "auth/user"
  }),

  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch("auth/logout");

      // Redirect to login.
      this.$router.push({ name: "login" });
    }
  }
};
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -0.375rem 0;
}
</style>
