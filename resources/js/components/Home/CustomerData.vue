<template>
  <div class="flex mb-4 flex-wrap">
    <div class="w-full h-full p-2 mt-2">
      <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Name</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <p class="text-90">{{customer[0].name}}</p>
        </div>
      </div>
      <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Sales</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <a
            href="#"
            class="no-underline font-bold dim text-primary"
          >{{customer[0].sales.name}}</a>
        </div>
      </div>
      <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Phone Number</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <p class="text-90">{{customer[0].phone_number}}</p>
        </div>
      </div>
      <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Kota</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <p class="text-90">{{customer[0].city}}</p>
        </div>
      </div>
      <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Virtual Account</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <p class="text-90">{{customer[0].virtual_account}}</p>
        </div>
      </div>
      <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Ktp</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <p class="text-90">{{customer[0].ktp}}</p>
        </div>
      </div>
      <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Alamat</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <p class="text-90">
           {{customer[0].address}}
          </p>
        </div>
      </div>
      <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Info Scc</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <p class="text-90">{{customer[0].info_scc}}</p>
        </div>
      </div>
      <div class="flex border-b border-40 remove-bottom-border">
        <div class="w-1/4 py-4">
          <h4 class="font-normal text-80">Npwp</h4>
        </div>
        <div class="w-3/4 py-4 break-words">
          <p class="text-90">{{customer[0].npwp}}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    customer: Array,
  },
};
</script>

<style>
</style>