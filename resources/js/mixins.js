import { mapGetters, mapActions } from "vuex";
import axios from "axios";
export default {
  data() {
    return {
      scrolled: false,
      windowWidth: 0,
      windowHeight: 0,
      create: {
        name: "",
        to: ""
      },
      langConfigs: [
        {
          name: "ภาษาไทย",
          code: "th"
        },
        {
          name: "English",
          code: "en"
        },
        {
          name: "中文",
          code: "cn"
        }
      ]
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
      user: "auth/user",
      museum_active: "museum/museum_active"
    }),
    museum_active_name(){
     let x = this.user.museums.find(el => el.id == +this.museum_active)
     console.log('x',x);
     return x.name ? x.name : '-'
    }
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
      upImg: "upload/uploadImage",
      fetchUser: "auth/fetchUser"
    }),
    async uploadFile(set) {
      console.log("uploadfile start");
      console.log(set);
      if (set.file) {
        const config = {
          headers: { "content-type": "multipart/form-data" }
        };
        let formData = new FormData();
        formData.append("file", set.file);
        formData.append("path", set.path);
        const { data } = await axios.post("/api/uploadFile", formData, config);
        return data;
      } else {
        return null;
      }
    },
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
