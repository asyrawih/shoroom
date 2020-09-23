import Axios from "axios";

const customer = {
    namespaced: true,
    state: {
        barcode: [],
    },
    mutations: {
        // MUTATIONS TO STATE
        GET_CUSTOMER: (state, payload) => {
            let { data } = payload
            data.forEach(element => {
                state.barcode.push(element)
            });
        },
    },
    actions: {
        // GET CUSTOMER FROM API
        getCustomer({ commit }) {
            Axios.get('api/customer')
                .then(res => {
                    commit('GET_CUSTOMER', res.data)
                });
        }
    },
}

export default customer;