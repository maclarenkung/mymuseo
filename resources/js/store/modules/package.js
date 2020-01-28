import axios from "axios";
import * as types from "../mutation-types";

export const state = {
  packages: null
};

export const getters = {
  packages: state => state.packages
};
export const mutations = {
  [types.FETCH_PACKAGE](state, data) {
    state.packages = data;
  }
};
export const actions = {
  async fetch({ commit }) {
    try {
      const { data } = await axios.get("/api/packages");

      commit(types.FETCH_PACKAGE, data);
    } catch (e) {
      console.log(e);
    }
  }
};
