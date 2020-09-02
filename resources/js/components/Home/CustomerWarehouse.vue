<template>
  <div class="flex flex-wrap">
    <div class="w-full">
      <table class="table-fixed overflow-auto">
        <thead class="text">
          <th class="w-24 px-4 py-2">Status</th>
          <th class="w-1/2 px-4 py-2">Customer Recv</th>
          <th class="w-24 px-4 py-2">OD</th>
          <th class="w-1/3 px-4 py-2">SO</th>
          <th class="w-1/5 px-4 py-2">Date GI</th>
        </thead>
        <tbody class="text-secondary font-bold">
          <tr v-for="row in warehouse" :key="row.id">
            <td class="border px-4 py-2">{{row.status}}</td>
            <td class="border px-4 py-2">{{row.cust_recv}}</td>
            <td class="border px-4 py-2">{{row.od}}</td>
            <td class="border px-4 py-2">{{row.so}}</td>
            <td class="border px-4 py-2">{{ row.date_gi | filterDate }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  name: "customer-unit",
  props : {
    warehouse : {
      type : Array
    }
  },

  filters : {
    filterDate(value) { 
      if(value){
        return moment(String(value)).format('DD/MM/YYYY')
      }
    }
  },

  data() {
    return {};
  },
};
</script>

<style>
</style>