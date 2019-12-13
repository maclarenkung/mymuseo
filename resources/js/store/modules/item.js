import axios from "axios";
import * as types from "../mutation-types";

// state
export const state = {
  show: null
};

// getters
export const getters = {
  show: state => state.show
};

// mutations
export const mutations = {
  [types.FETCH_ITEM_SHOW](state, data) {
    state.show = data;
  }
};

// actions
export const actions = {
  async show({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/items/${id}`);

      commit(types.FETCH_ITEM_SHOW, data);
    } catch (e) {
      console.log(e);
    }
  },
  async del({ dispatch }, id) {
    try {
      const { data } = await axios.delete(`/api/items/${id}`);
    } catch (e) {
      console.log(e);
    }
  }
};
