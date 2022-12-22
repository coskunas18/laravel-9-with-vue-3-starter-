<template>
   <component :is="itemType" :href="itemLink"  @click="menu.setActiveLink(item.id)"
    class="flex justify-between items-center hover:bg-slate-600"
     :class="[subLink ? '' : 'px-4 py-2', currentLink ? 'bg-cyan-900' : '' ,activeLink === item.id ? 'bg-cyan-900' : '']" >

     <!--Link İnfo-->
     <div class="flex space-x-4 items-center cursor-pointer w-full "
     :class="[
      subLink ? 'pl-8 py-3' : ''
     ]"  >
     <!-- Icon -->
     <font-awesome-icon v-if="item['icon']" :icon="item.icon" />
     <!--Label-->
      <span v-text="item.label"/>
   </div>
     <!--Dropdown Icon-->
     <font-awesome-icon v-if="item['type'] === 'dropdown'" icon="fa-solid fa-chevron-down" />
   </component>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { useStore } from '@/stores/useMenu.js';
import {storeToRefs} from 'pinia'
import {computed,} from "vue";
const menu = useStore();
const {activeLink,showMenu} = storeToRefs(menu);

const props = defineProps({
   item:Object,
   subLink:Boolean,
})



const itemType = computed(()=>{
   let elementType;

   if (props.item.type === 'dropdown') {
        elementType = 'div';
   }else if(props.item.type === 'link'){
      elementType = 'a';
   }else{
      elementType = Link
   }

   return elementType;
});

const currentLink = computed(() =>{
   let status;
   console.log(route().current())
   if (props.item.type == "route") {
     status = route().current(props.item.link);
   }
   return status;

});

const itemLink = computed(() =>{
   let link;
   if (props.item.type === "link") {
      link = props.item.link
   }else if(props.item.type === "route"){
      link = route(props.item.link)
   }

   return link;
});
</script>

<style lang="scss" scoped>

</style>
