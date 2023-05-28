export const state = () => ({
  counter: 0
})

export const getters = {
  getCounter(state) {
    return state.counter
  },
  baseURLBackend: state => process.env.baseURLBackend,
  storageUrl: state => process.env.baseURLBackend + '/storage/',
}

export const mutations = {
  increment(state) {
    state.counter++
  }
}

export const actions = {
  async fetchCounter({ state }) {
    // make request
    const res = { data: 10 };
    state.counter = res.data;
    return res.data;
  }
}