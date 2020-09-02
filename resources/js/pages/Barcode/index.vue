<template>
  <div class="flex mx-3 flex-wrap">
    <div class="flex mt-3 mx-2" v-for="row in barcode" :key="row.id">
      <barcode :value="row.sold_to_party" height="52" background="white">
        <span class="text-white"></span>
      </barcode>
    </div>
  </div>
</template>

<script>
import VueBarcode from "vue-barcode";
export default {
  data() {
    return {
      barcode: [
        {
          id: 1,
          sold_to_party: "123123123",
        },
        {
          id: 2,
          sold_to_party: "123123123",
        },
        {
          id: 3,
          sold_to_party: "123123123",
        },
      ],
    };
  },
  components: {
    barcode: VueBarcode,
  },
};
</script>

<style>
</style>