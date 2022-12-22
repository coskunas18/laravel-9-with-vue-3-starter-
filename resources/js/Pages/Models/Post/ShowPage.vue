<template>
    <visitor-layout :header="header">
        <template #actionArea>
            <div class="flex space-x-2 mr-3">
          <t-button label="Düzenle"
           icon="fa-pen" :link="route('post.edit',post.id)" class="mr-3 dark:bg-blue-700" />
           <t-button label="Sil"
           icon="fa-trash" @click="handleDelete(post.id)" class="mr-3 dark:bg-red-700" />
        </div>
        </template>


        <!--Wrapper-->
        <div class="flex flex-col space-y-4 mt-3">
   <!-- Code -->
   <div class="space-x-2 flex">
            <span class="font-semibold">Code:</span>
            <span v-text="post.code"></span>

     <!-- Status -->
         <div>
         <span class="px-4 py-2 rounded-lg " :class="(post.status == 1 ? 'text-emerald-600 bg-emerald-200'
         : 'text-red-500')">
           {{ post.status == 1 ? 'Aktif' : 'Pasif' }}
         </span>
       </div>

    </div>
       <!--Summary-->
        <div class="space-x-2">
            <span class="font-semibold">Özet:</span>
            <span>
               {{ post.summary == null ? 'herhangi bir yazı yok' : post.summary }}
           </span>
        </div>
        <!-- Authors -->
      <div>
         <template v-for="i in post.authors">
            <div class="flex space-x-2 items-center border px-4 py-2 first:rounded-t-lg last:rounded-b-lg">
            <font-awesome-icon icon="fa-solid fa-user fa-10x" class="text-" />
             <span>{{ i.name }}</span>
            </div>
         </template>
      </div>

        </div>

    </visitor-layout>
</template>

<script setup>
import VisitorLayout from '@/Layouts/VisitorLayout.vue';
import TButton from '@/Components/TButton.vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    header:String,
    post:Object,
})

const handleDelete = (id) =>{
    Inertia.delete(route('post.destroy',id))
}
</script>

<style lang="scss" scoped>

</style>
