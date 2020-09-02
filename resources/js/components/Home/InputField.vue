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
        :class="{ 'invisible' : isDisable}"
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
      isDisable: false,
    };
  },

  methods: {
    updateValue(e) {
      this.content = e.target.value;
      this.$emit("input", this.content);
    },

    handleEnter(e) {
      this.isDisable = true;
      this.$emit("enter", e.target.value);
      e.target.value = "";
      setTimeout(() => {
        this.isDisable = false;
      }, 100);
    },
    handleEsc(e) {
      this.$store.dispatch('resetScaner' , [])
    },
  },
};
</script>

<style lang="scss">
</style>