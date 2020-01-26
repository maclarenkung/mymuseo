import axios from "axios";
import * as types from "../mutation-types";

// state
export const state = {
  items: null,
  show: null
};

// getters
export const getters = {
  show: state => state.show,
  items: state => state.items
};

// mutations
export const mutations = {
  [types.FETCH_ITEM_SHOW](state, data) {
    state.show = data;
  },
  [types.FETCH_ITEM](state, data) {
    state.items = data;
  }
};

// actions
export const actions = {
  async fetch({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/items`);

      commit(types.FETCH_ITEM, data);
      console.log(data);
    } catch (e) {
      console.log(e);
    }
  },
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
      var r = confirm("คุณแน่ใจที่จะลบสิ่งนี้?");
      if (r == true) {
        const { data } = await axios.delete(`/api/items/${id}`);
      }
    } catch (e) {
      console.log(e);
    }
  }
};
