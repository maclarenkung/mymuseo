<template>
  <div id="app">
    <!-- <script src="https://use.fontawesome.com/a7f7734e77.js"></script> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../font/flaticon.css" /> -->
    <loading ref="loading" />

    <transition name="page" mode="out-in">
      <component :is="layout" v-if="layout" />
    </transition>
  </div>
</template>

<script>
import Loading from "./Loading";
import Vue from "vue";
import vSelect from "vue-select";
import VueApexCharts from "vue-apexcharts";

Vue.use(VueApexCharts);

Vue.component("v-select", vSelect);
// Load layout components dynamically.
const requireContext = require.context("~/layouts", false, /.*\.vue$/);

const layouts = requireContext
  .keys()
  .map(file => [file.replace(/(^.\/)|(\.vue$)/g, ""), requireContext(file)])
  .reduce((components, [name, component]) => {
    components[name] = component.default || component;
    return components;
  }, {});

export default {
  el: "#app",

  components: {
    Loading
  },

  data: () => ({
    layout: null,
    defaultLayout: "default"
  }),

  metaInfo() {
    const { appName } = window.config;

    return {
      title: appName,
      titleTemplate: `%s · ${appName}`
    };
  },

  mounted() {
    this.$loading = this.$refs.loading;
  },

  methods: {
    /**
     * Set the application layout.
     *
     * @param {String} layout
     */
    setLayout(layout) {
      if (!layout || !layouts[layout]) {
        layout = this.defaultLayout;
      }

      this.layout = layouts[layout];
    }
  }
};
</script>
