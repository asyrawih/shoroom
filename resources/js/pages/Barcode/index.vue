<template>
  <div class="barcode container mx-auto">
    <InputField title="Search ..." margin="mt-2 mb-3" @update="handleSearch" />
    <div
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-1 gap-3"
    >
      <div
        class="relative text-center"
        id="card"
        v-for="row in handle"
        :key="row.id"
      >
        <img
          src="../../../assets/card.png"
          class="w-full h-auto rounded object-fill object-center"
        />
        <div class="flex flex-col absolute top-20 bg-fixed left-6 text-sm">
          <div class="flex mb-1">
            <span class="font-extrabold">Nama</span>
            <span class="ml-11">{{ row.name }}</span>
          </div>
          <div class="flex mb-1">
            <span class="font-extrabold">Sales</span>
            <span class="ml-12">{{ row.sales.name }}</span>
          </div>
          <div class="flex mb-1">
            <span class="font-extrabold">Tlp Sales</span>
            <span class="ml-6">{{ row.sales.phone_number }}</span>
          </div>
          <div class="flex mb-1">
            <span class="font-extrabold">VCC</span>
            <span class="ml-14">{{ row.virtual_account }}</span>
          </div>
          <div class="flex mb-1">
            <span class="font-extrabold">Info SCC</span>
            <span class="ml-7">1500228</span>
          </div>
        </div>
        <div class="flex absolute bottom-24 right-10">
          <div class="flex flex-col">
            <div class="flex">
              <span class="text-white font-bold text-sm mr-1">SOLD ID</span>
              <qrcode
                :value="row.sold_to_party"
                tag="img"
                style="height: 50px"
              />
            </div>
            <div class="flex space-y-1">
              <span class="text-white font-bold text-sm mr-2">SHIP ID</span>
              <qrcode :value="row.ship_to_id" tag="img" style="height: 50px" />
            </div>
          </div>
        </div>
        <div class="flex absolute bottom-4 left-20">
          <span class="font-bold">www.trakindo.co.id</span>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import VueBarcode from "vue-barcode";
import QrCode from "@chenfengyuan/vue-qrcode";
import InputField from "../../components/shared/Input";
import { mapActions, mapState } from "vuex";
export default {
  data() {
    return {
      searchQuery: "",
    };
  },

  mounted() {
    this.getCustomer();
  },

  methods: {
    ...mapActions("customer", ["getCustomer"]),
    handleSearch(e) {
      this.searchQuery = e;
    },
  },
  computed: {
    ...mapState("customer", ["barcode"]),
    handle() {
      if (this.searchQuery) {
        return this.barcode.filter((item) => {
          return this.searchQuery
            .toLowerCase()
            .split(" ")
            .every((v) => item.name.toLowerCase().includes(v));
        });
      } else {
        return this.barcode;
      }
    },
  },
  components: {
    barcode: VueBarcode,
    qrcode: QrCode,
    InputField: InputField,
  },
};
</script>

<style>
@media print {
  button {
    display: none;
  }
  nav {
    display: none;
  }

  input {
    display: none;
  }

  body {
    margin: 0;
    padding: 0;
  }

  #card {
    margin-bottom: 18px;
  }

  * {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}
</style>