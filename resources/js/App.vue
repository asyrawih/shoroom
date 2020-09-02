<template>
  <div class="container mx-auto">
    <Input-Field v-model="value" @enter="handle" />
    <CustomerField v-if="customers.length > 0">
      <CustomerData :customer="customers" />
    </CustomerField>

    <MenuHeader title="Units" v-if="customers.length > 0" />

    <CustomerField v-if="customers.length > 0">
      <CustomerUnit :units="customers[0].units" />
    </CustomerField>

    <MenuHeader title="Warehouse" v-if="customers.length > 0" />

    <CustomerField v-if="customers.length > 0">
      <CustomerWarehouse :warehouse="customers[0].warehouses" />
    </CustomerField>
  </div>
</template>

<script>
/**
 * Importing Components
 *
 */
import InputField from "./components/Home/InputField";
import CustomerField from "./components/Home/CustomerField";
import CustomerData from "./components/Home/CustomerData";
import CustomerUnit from "./components/Home/CustomerUnit";
import MenuHeader from "./components/Home/MenuHeader";
import CustomerWarehouse from "./components/Home/CustomerWarehouse";

import { mapState, mapActions } from "vuex";

export default {
  components: {
    InputField,
    CustomerField,
    CustomerData,
    CustomerUnit,
    MenuHeader,
    CustomerWarehouse,
  },

  computed: {
    ...mapState(["customers" , 'error']),
  },

  data() {
    return {
      value: "",
    };
  },

  methods: {
    handle(barcode) {
      this.getCustomer(barcode);
    },
    getCustomer(barcode) {
      this.$store.dispatch("scanBarcode", barcode);
    },
  },
};
</script>
