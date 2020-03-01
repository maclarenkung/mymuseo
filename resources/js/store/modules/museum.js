import axios from "axios";
import Cookies from "js-cookie";

import * as types from "../mutation-types";

// state
export const state = {
  museum_active: Cookies.get("museum_active") || 0,
  museums: null,
  show: null
};

// getters
export const getters = {
  museums: state => state.museums,
  museum_active: state => state.museum_active,
  show: state => state.show
};

// mutations
export const mutations = {
  [types.SET_MUSEUM_ACTIVE](state, { museum_active }) {
    state.museum_active = museum_active;
  },
  [types.FETCH_MUSEUM](state, data) {
    state.museums = data;
  },
  [types.FETCH_MUSEUM_SHOW](state, data) {
    state.show = data;
  }
};

// actions
export const actions = {
  setMuseumActive({ commit }, active) {
    let museum_active = active;
    commit(types.SET_MUSEUM_ACTIVE, { museum_active });
    console.log("kuay");

    Cookies.set("museum_active", museum_active, { expires: 365 });
  },
  async fetch({ commit }) {
    try {
      const { data } = await axios.get("/api/museums");

      commit(types.FETCH_MUSEUM, data);
    } catch (e) {
      console.log(e);
    }
  },
  async customerFetch({ commit }) {
    try {
      const { data } = await axios.get("/api/customer/museums");

      commit(types.FETCH_MUSEUM, data);
    } catch (e) {
      console.log(e);
    }
  },
  async show({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/museums/${id}`);

      commit(types.FETCH_MUSEUM_SHOW, data);
    } catch (e) {
      console.log(e);
    }
  },
  async del({ dispatch }, id) {
    try {
      const { data } = await axios.delete(`/api/museums/${id}`);
      dispatch("fetch");
    } catch (e) {
      console.log(e);
    }
  }
};
