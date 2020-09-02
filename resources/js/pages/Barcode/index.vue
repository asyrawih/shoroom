<template>
  <div class="input-field mx-2">
    <div class="flex mx-3 flex-wrap">
      <input
        class="bg-white focus:outline-none focus:shadow-outline border-4 border-secondary rounded-lg py-5 px-4 w-full appearance-none leading-normal"
        type="email"
        placeholder="barcode"
        id="input"
        v-model="barcodeValue"
      />
      <barcode :value="barcodeValue">
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
      barcodeValue: "tes",
    };
  },
  components: {
    barcode: VueBarcode,
  },
};
</script>

<style>
</style>