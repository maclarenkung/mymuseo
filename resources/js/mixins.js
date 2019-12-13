import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      scrolled: false,
      windowWidth: 0,
      windowHeight: 0
    };
  },
  computed: {
    xs() {
      return this.windowWidth < 576;
    },
    sm() {
      return this.windowWidth >= 576;
    },
    md() {
      return this.windowWidth >= 768;
    },
    lg() {
      return this.windowWidth >= 992;
    },
    xl() {
      return this.windowWidth >= 1200;
    },
    checkAdmin() {
      if (this.user) {
        return this.user.role.slug === "admin";
      } else {
        return false;
      }
    },
    removeContainerOnMobile() {
      return this.xs ? "" : "container";
    },
    ...mapGetters({
      user: "auth/user"
    })
  },
  mounted() {
    this.$nextTick(function() {
      window.addEventListener("resize", this.getWindowWidth);
      window.addEventListener("resize", this.getWindowHeight);

      // Init
      this.getWindowWidth();
      this.getWindowHeight();
    });
  },
  beforeMount() {
    window.addEventListener("scroll", this.handleScroll);
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.handleScroll);
  },
  methods: {
    ...mapActions({
      upImg: "upload/uploadImage"
    }),
    handleScroll() {
      this.scrolled = window.scrollY;
    },
    getWindowWidth(event) {
      this.windowWidth = document.documentElement.clientWidth;
    },
    getWindowHeight(event) {
      this.windowHeight = document.documentElement.clientHeight;
    },
    beforeDestroy() {
      window.removeEventListener("resize", this.getWindowWidth);
      window.removeEventListener("resize", this.getWindowHeight);
    }
  }
};
