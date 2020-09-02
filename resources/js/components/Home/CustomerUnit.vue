<template>
  <div class="flex flex-wrap">
    <div class="w-full">
      <table class="table-fixed overflow-auto">
        <thead class="text">
          <th class="w-1/6 px-4 py-2">Serial Unit</th>
          <th class="w-1/4 px-4 py-2">Model Unit</th>
          <th class="w-1/4 px-4 py-2">Deskripisi</th>
          <th class="w-1/3 px-4 py-2">No Unit</th>
          <th class="w-1/2 px-4 py-2">Kota</th>
          <th class="w-1/2 px-4 py-2">SMU</th>
        </thead>
        <tbody class="text-secondary font-bold">
          <tr v-for="row in units" :key="row.id">
            <td class="border px-4 py-2">{{row.sn_unit}}</td>
            <td class="border px-4 py-2">{{row.model_unit}}</td>
            <td class="border px-4 py-2">{{row.desc}}</td>
            <td class="border px-4 py-2">{{row.kota}}</td>
            <td class="border px-4 py-2">{{row.no_unit}}</td>
            <td class="border px-4 py-2">{{row.smu}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "customer-unit",
  props : {
    units : {
      type : Array
    }
  },
  data() {
    return {};
  },
};
</script>

<style>
</style>