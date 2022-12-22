<template>
    <visitor-layout :header="header">

        <template #actionArea>
          <t-button label="Yeni Personel Ekle" icon="fa-plus" :link="route('post.create')" class="mr-3" />
        </template>

        <t-table :data="postList" :headers="headers">
            <template #status="{props}">
                <div class="flex justify-center items-center">
                    <font-awesome-icon :icon ="(props.status === 1 ? 'fa-check': 'fa-xmark')"
                    :class="props.status === 1 ? 'text-emerald-500' : 'text-red-500'"/>
                </div>
            </template>

            <template #action = {props}>
                <div class="flex justify-center items-center">
                  <t-button icon="fa-eye" class="dark:bg-slate-700 border-none" :link="route('post.show',props.id)" />
                  <t-button icon="fa-pen" class="dark:bg-blue-500 border-none" :link="route('post.edit',props.id)"  />
                  <t-button icon="fa-trash" class="dark:bg-red-500 border-none" @click="handleDelete(props.id)"   />
                </div>
            </template>
        </t-table>
    </visitor-layout>

</template>

<script setup>
import VisitorLayout from '@/Layouts/VisitorLayout.vue';
import TTable from '@/Components/TTable.vue';
import TButton from '@/Components/TButton.vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    postList:Object,
    header:String,
})

const headers = [
    {
        id:'name',
        label:'Yazı Başlığı'
    },
    {
        id:'status',
        label:'Durum'
    },
    {
        id:'action',
        label:'İşlemler'
    },
]

const handleDelete = (id) =>{
  Inertia.delete(route('post.destroy',id),{

    onBefore: visit => confirm("Öğe silinecektir, emin misiniz?"),

  })
}
</script>

<style lang="scss" scoped>

</style>
