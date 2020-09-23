<template>
  <div class="input-field">
    <input
      class="bg-white focus:outline-none focus:shadow-outline border-4 border-secondary rounded-lg py-2 px-4 w-full appearance-none leading-normal"
      type="email"
      :placeholder="title"
      :class="margin"
      id="input"
      autofocus
      @input="updateSearch"
    />
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    margin: String,
    cari: String,
  },
  methods: {
    updateSearch(e) {
      this.$emit("update", e.target.value);
    },
  },
};
</script>

<style>
</style>