<template>
  <div class="input-field mx-2">
    <div class="flex mx-3">
      <input
        class="bg-white focus:outline-none focus:shadow-outline border-4 border-secondary rounded-lg py-5 px-4 w-full appearance-none leading-normal"
        type="email"
        placeholder="Scan barcode di sini"
        @input="updateValue"
        @keyup.enter="handleEnter"
        @keydown.esc="handleEsc"
        id="input"
        autofocus
      />
    </div>
  </div>
</template>

<script>

import {mapActions} from "vuex"

export default {
  name: "input-field",
  props: {
    value: String,
  },

  data() {
    return {
      content: this.value,
    };
  },

  methods: {
    updateValue(e) {
      this.content = e.target.value;
      this.$emit("input", this.content);
    },

    handleEnter(e) {
      this.$emit("enter", e.target.value);
      e.target.value = "";
    },
    handleEsc(e) {
      this.$store.dispatch('resetScaner' , [])
    },
  },
};
</script>

<style lang="scss">
</style>