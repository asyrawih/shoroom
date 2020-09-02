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
            Vue.$toast.error(state.error.message)
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
            Axios.get('api/customer/search/' + barcode)
                .then(res => {
                    if(res.status == 200){
                        Vue.$toast.success('Data Berhasil Di Dapatkan')
                    }
                    commit('ADD_CUSTOMER' , res.data.data[0])
                }).catch((e) => {
                    Vue.$toast.error(e.response.data.messages)
                });
        }

    },
})