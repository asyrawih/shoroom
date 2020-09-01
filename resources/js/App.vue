<template>
  <div class="container mx-auto">
    <Input-Field v-model="value" @input="listenInput" />
    <CustomerField v-if="value != '' " />
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
    };
  },
  methods: {
    listenInput(e) {
      console.log(e);
    },
  },
};
</script>
