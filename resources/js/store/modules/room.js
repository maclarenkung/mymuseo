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
  [types.FETCH_ROOM_SHOW](state, data) {
    state.show = data;
  },
  [types.FETCH_ROOM](state, data) {
    state.items = data;
  }
};

// actions
export const actions = {
  async fetch({ commit }, floor_id) {
    try {
      const { data } = await axios.get(`/api/rooms?floor_id=${floor_id}`);
      commit(types.FETCH_ROOM, data);
    } catch (e) {
      console.log(e);
    }
  },
  async show({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/rooms/${id}`);

      commit(types.FETCH_ROOM_SHOW, data);
    } catch (e) {
      console.log(e);
    }
  },
  async del({ dispatch }, id) {
    try {
      const { data } = await axios.delete(`/api/rooms/${id}`);
    } catch (e) {
      console.log(e);
    }
  }
};
