import axios from 'axios';
import * as types from '../mutation-types';

// state
export const state = {
  show: null
}

// getters
export const getters = {
  show: state => state.show
}

// mutations
export const mutations = {
  [types.FETCH_FLOOR_SHOW] (state, data) {
    state.show = data
  }
}

// actions
export const actions = {
  async show ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/floors/${id}`)

      commit(types.FETCH_FLOOR_SHOW, data)
    } catch (e) {
      console.log(e)
    }
  },
  async del ({ dispatch }, id) {
    try {
      const { data } = await axios.delete(`/api/museums/${id}`)
    } catch (e) {
      console.log(e)
    }
  }
}
