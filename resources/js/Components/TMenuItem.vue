<template>
   
   <button @click="menu.toggleMenu()">Menüyü Gizle</button>
   <div @click="activeLink = item.id"
    class="flex justify-between items-center hover:bg-slate-600"
    :class="[
      subLink ? '': 'px-4 py-2'
    ]">
     <!--Link İnfo-->
     <div class="flex space-x-4 items-center cursor-pointer "
     :class="[
      subLink ? 'pl-8 py-2' : ''
     ]"  >
     <!-- Icon -->
     <font-awesome-icon v-if="item['icon']" :icon="item.icon" />
     <!--Label-->
      <span v-text="item.label"/>
   </div>
     <!--Dropdown Icon-->
     <font-awesome-icon v-if="item['type'] === 'dropdown'" icon="fa-solid fa-chevron-down" />
   </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { useStore } from '@/stores/useMenu.js';
import {storeToRefs} from 'pinia'

const menu = useStore();
const {activeLink,showMenu} = storeToRefs(menu);

defineProps({
   item:Object,
   subLink:Boolean,
})
</script>

<style lang="scss" scoped>

</style>
