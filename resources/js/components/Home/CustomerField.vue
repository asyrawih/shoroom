<template>
  <div class="customer mt-12">
    <div class="flex mb-4 mx-3">
      <div
        class="w-full lg:w-1/2 xl:w-full p-3 text-white bg-main shadow-lg h-full border-4 border-secondary rounded-md"
      >
      <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({}),
  mounted() {
    console.log("its works");
  },
};
</script>

<style>
</style>