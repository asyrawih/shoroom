import Vue from 'vue';
import Vuex from "vuex";
import Axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    // State To Api
    state: {
        isLoading: false,
        customers: [],
        error: {
            message: ''
        }
    },
    // Mutation To State
    mutations: {
        RESET_SCANNER: (state) => {
            state.customers = [];
        },
        ADD_CUSTOMER: (state, customer) => {
            state.customers.push(customer)
        },
        ERROR: (state, error) => {
            state.error.message = error
        }
    },
    // Commit At Action
    actions: {
        // Fill To Empty Customer
        resetScaner({ commit }) {
            commit('RESET_SCANNER')
        },
        // Adding Customer To State
        addCustomer({ commit, state }, customer) {
            state.isLoading = true
            commit('ADD_CUSTOMER', customer)
        },

        //Scan the barcode And Get data
        scanBarcode({ commit, state }, barcode) {
            state.isLoading = true
            Axios.get('/api/customer/' + barcode)
                .then(({ data }) => {
                    if (data.message) {
                        commit('ERROR', data.message)
                    }
                    if(data[0] == undefined) {
                        return 
                    }
                    commit('ADD_CUSTOMER', data[0])
                })
            state.isLoading = false
        }

    },
})