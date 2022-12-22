<template>
    <!--Menu Wrapper-->
   <div class="flex flex-col flex-shrink-0 dark:bg-neutral-700 w-[15rem] transition-all duration-300"
    :class="showMenu ? 'ml-0' : '-ml-[16rem]'">
     <!-- Logo -->
     <div class="flex justify-center font-bold text-center h-16 items-centertext-2xl text-slate-900
      dark:text-white select-none">
        <span class="text-xl" >
          Jetstream Eğitimi
        </span>
     </div>
      <!--Menu-->
    <div class="flex flex-col flex-grow mt-10 space-y-4">
       <!--Menu Items-->
       <template v-for="root in links">
        <t-menu-item :item="root" />
          <!--Sub Links-->
          <div v-if="root['items'] && activeLink === root.id" class=" space-y-2 cursor-pointer
          bg-slate-500/25 py-2">
            <template v-for="sub in root.items" >
                    <t-menu-item :item="sub" sub-link />
            </template>
          </div>
       </template>
    </div>
    <!--User Info-->
    <div class="bg-green-400 flex items-center dark:bg-slate-800/50 h-16 px-4 space-x-4">
        <!-- Avatar -->
        <img :src="$page.props.user.profile_photo_url" class="rounded-full h-10 w-10" alt="">
        <!--User Info-->
        <div class="space-x-3">
           <span v-text="$page.props.user.name"></span>
           <font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket"
            class="cursor-pointer hover:scale-110 hover:text-red-500 active:scale-90" @click="logout" />
        </div>
    </div>
   </div>
</template>

<script setup>
import Menu from "@/sources/menu.js";
import { ref,onMounted} from "vue";
import TMenuItem from "./TMenuItem.vue";
import { useStore } from '@/stores/useMenu.js';
import {storeToRefs} from 'pinia'
import { Inertia } from "@inertiajs/inertia";
const menu = useStore();
const {activeLink,showMenu} = storeToRefs(menu);
const { links } = Menu();


const logout = () => {
    Inertia.post(route('logout'));
}


onMounted(()=>{
   let current = route().current();
   links.value.find(i =>{
    if (i.link == current) {
       menu.setActiveLink(i.id)
    }
    if(i['items']){
      i.items.find( j => {
        if (j.link == current) {
          menu.setActiveLink(j.id.split('-')[0])
       }
      })
    }
   })
})


</script>

<style scoped>
*{
    color:white;
    font-weight: bold;
}
</style>
