<template>
  <div class="input-field mx-2">
    <div class="flex mx-3">
      <input
        class="bg-white focus:outline-none focus:shadow-outline border-4 border-secondary rounded-lg py-5 px-4 block w-full appearance-none leading-normal"
        type="email"
        autofocus
        placeholder="Scan barcode di sini"
        @input="updateValue"
        @keyup.enter="handleEnter"
      />
    </div>
  </div>
</template>

<script>
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
    },
  },
};
</script>

<style lang="scss">
</style>