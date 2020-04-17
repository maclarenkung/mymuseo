import Vue from "vue";
import store from "~/store";
import router from "~/router";
import i18n from "~/plugins/i18n";
import App from "~/components/App";

import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import Mixins from "./mixins";

import "~/plugins";
import "~/components";
import VueQrcodeReader from "vue-qrcode-reader";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";

Vue.use(VueQrcodeReader);

Vue.use(ElementUI);
Vue.mixin(Mixins);

Vue.config.productionTip = false;

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
// app.js
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
});
