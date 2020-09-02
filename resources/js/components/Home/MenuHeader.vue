<template>
  <div class="flex justify-start text-justify items-center mx-2">
    <div
      class="bg-gradient-to-tr from-main to-secondary h-12 rounded-lg p-4 w-28 text-white font-bold"
    >{{title}}</div>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    required: true,
  },
};
</script>

<style>
</style>