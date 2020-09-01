<template>
  <div class="container mx-auto">
    <Input-Field v-model="value" @enter="handle" />
    <CustomerField v-if="customer.length > 0 " />
  </div>
</template>

<script>
import InputField from "./components/Home/InputField";
import CustomerField from "./components/Home/CustomerField";
export default {
  components: {
    InputField,
    CustomerField,
  },

  data() {
    return {
      value: "",
      isLoading: false,
      customer: [],
    };
  },

  methods: {
    handle(e) {},
    getCustomer(query) {},
  },
};
</script>
