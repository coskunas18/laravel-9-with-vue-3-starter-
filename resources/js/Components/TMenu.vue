<template>
    <!--Menu Wrapper-->
   <div class="flex flex-col flex-shrink-0 dark:bg-neutral-700 w-[15rem]">
     <!-- Logo -->
     <div class="flex justify-center font-bold text-center h-16 items-centertext-2xl text-slate-900
      dark:text-white select-none">
        <span class="text-xl" >
          Jetstream Eğitimi
        </span>
     </div>
     {{ activeLink }}
      <!--Menu-->
    <div class="flex flex-col flex-grow mt-10 space-y-4  ">
       <!--Menu Items-->
       <template v-for="root in links">
          <div @click="activeLink = root.id" class="flex justify-between px-4 items-center py-2 cursor-pointer hover:bg-slate-600 ">
            <!--Link İnfo-->
            <div class="flex space-x-4 items-center">
            <!-- Icon -->
            <font-awesome-icon v-if="root['icon']" :icon="root.icon" />
            <!--Label-->
             <span v-text="root.label"/>
          </div>
            <!--Dropdown Icon-->
            <font-awesome-icon v-if="root['type'] === 'dropdown'" icon="fa-solid fa-chevron-down" />
          </div>

          <!--Sub Links-->
          <div v-if="root['items'] && activeLink === root.id" class=" space-y-2 cursor-pointer
          bg-slate-500/25 py-2 ">
            <template v-for="sub in root.items">
               <div>
                 <div class="flex pl-8 py-2 space-x-4 items-center hover:bg-slate-600">
                    <!-- Icon -->
                    <font-awesome-icon v-if="sub['icon']" :icon="sub.icon" />
                    <!--Label-->
                    <span v-text="sub.label"/>
                 </div>
               </div>
            </template>
          </div>
       </template>
    </div>
    <!--User Info-->
    <div class="bg-green-400 flex items-center dark:bg-slate-800/50 h-16 px-4 space-x-4">
        <!-- Avatar -->
        <img src="https://i.pravatar.cc/40" class="rounded-full" alt="">
        <!--User Info-->
        <div class="space-x-3">
           <span>Coşkun Demirel</span>
           <font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket"
            class="cursor-pointer hover:scale-110 hover:text-red-500 active:scale-90" />
        </div>
    </div>
   </div>
</template>

<script setup>
import Menu from "@/sources/menu.js";
import { ref } from "vue";

const activeLink = ref();
const { links } = Menu();
</script>

<style scoped>
*{
    color:white;
    font-weight: bold;
}
</style>
