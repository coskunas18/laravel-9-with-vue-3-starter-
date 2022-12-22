<template>
    <!-- Table -->
    <div class="flex justify-center items-center">
   <table class="w-11/12 mt-3 select-none">
     <!-- Header -->
     <thead >
        <!-- Columns -->
        <template  v-for="header in headers">
            <th  class="dark:bg-slate-800 dark:text-white text-black  bg-blue-300
             first:rounded-tl-lg last:rounded-tr-lg p-2 ">
                {{ header.label }}
            </th>
        </template>

     </thead>
     <!-- Body -->
     <tbody>
        <!-- Record -->
        <template v-for="row in tableData" class="flex justify-center items-center">
        <tr class="dark:odd:bg-slate-500 odd:bg-amber-200 group   ">
            <template v-for="column in headers" class="flex justify-center items-center">
          <!-- Column -->
            <td class="p-2 group-last:first:rounded-bl-lg group-last:last:rounded-br-lg dark:text-white
             text-black text-center ">
             <slot v-if="$slots.hasOwnProperty(column.id)" :name="column.id" :props="row" />
             <span v-else v-text="row[column.id]"></span>
            </td>
        </template>
        </tr>
    </template>
     </tbody>
   </table>
</div>

      <!--Paginate-->
      <div v-if="data.hasOwnProperty('data')" class="flex justify-center mt-10 space-x-2 mb-2">
        <template v-for="i in data.links" >
            <Link :href="i.url" class="flex justify-center items-center border rounded-md h-7 min-w-[1.5rem]
             p-2 dark:bg-slate-300 bg-sky-300 text-black"
            :class="i.active ? 'bg-sky-700 dark:text-white dark:bg-slate-700' :'' ">
                <span v-html="i.label"></span>
            </Link>

        </template>
      </div>

</template>

<script setup>
import {computed} from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    data: [Array,Object],
    headers: [Array,Object],
})


const tableData = computed(() =>{
    if (props.data.hasOwnProperty('data')) { //eğer paginate ile yollandıysa burası dönecek
         return props.data.data
    }else{
        return props.data
    }
})

</script>

<style lang="scss" scoped>

</style>
