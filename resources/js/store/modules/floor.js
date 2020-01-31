import axios from "axios";
import * as types from "../mutation-types";

// state
export const state = {
  show: null,
  items: null
};

// getters
export const getters = {
  show: state => state.show,
  items: state => state.items
};

// mutations
export const mutations = {
  [types.FETCH_FLOOR_SHOW](state, data) {
    state.show = data;
  },
  [types.FETCH_FLOOR](state, data) {
    state.items = data;
  }
};

// actions
export const actions = {
  async fetch({ commit }) {
    try {
      const { data } = await axios.get(`/api/floors`);

      commit(types.FETCH_FLOOR, data);
    } catch (e) {
      console.log(e);
    }
  },
  async show({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/floors/${id}`);

      commit(types.FETCH_FLOOR_SHOW, data);
    } catch (e) {
      console.log(e);
    }
  },
  async del({ dispatch }, id) {
    try {
      const { data } = await axios.delete(`/api/museums/${id}`);
    } catch (e) {
      console.log(e);
    }
  }
};
