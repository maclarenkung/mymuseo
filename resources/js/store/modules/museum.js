import axios from "axios";
import * as types from "../mutation-types";

// state
export const state = {
  museums: null,
  show: null
};

// getters
export const getters = {
  museums: state => state.museums,
  show: state => state.show
};

// mutations
export const mutations = {
  [types.FETCH_MUSEUM](state, data) {
    state.museums = data;
  },
  [types.FETCH_MUSEUM_SHOW](state, data) {
    state.show = data;
  }
};

// actions
export const actions = {
  async fetch({ commit }) {
    try {
      const { data } = await axios.get("/api/museums");

      commit(types.FETCH_MUSEUM, data);
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
