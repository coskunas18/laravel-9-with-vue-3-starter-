<template>
    <visitor-layout header="Form Komponenti">
        <template #actionArea>
            <t-button label="Yeni Personel Ekle" @clicked="(showCreateModal = true)" />
        </template>

        <!-- Table -->
        <t-table :data="tableData" :headers="tableHeaders"/>

    </visitor-layout>



    <teleport to = "body">
          <t-modal title="Personel Ekleme Formu" v-model="showCreateModal">
            <t-form @submitted="submitHandle" @reset="resetHandle" title="Personel ekleme formu"
         subTitle="Beyaz yakalı personel eklemek için kullanınız" >
               <t-text-input icon="fa-solid fa-caravan" label="İsim" v-model="form.name"
                class="col-span-3" :errors="['Bu alan gereklidir']" clearable />

             <t-text-input label="Email" v-model="form.email" class="col-span-3" clearable />

            <t-select-input class="col-span-3"  label="İl Seçiniz" clearable valueKey="id"
             :options="options" labelKey="name" v-model="form.provice"  />

             <!--Empty Field-->
             <div class="col-span-3"></div>

             <!-- Checkbox -->
             <t-checkbo-input  v-model="form.working_tools" class="col-span-3" label="Çalışma Araçları"
             :options="calismaAraclari" />
             <!-- Radio Button -->
              <t-radio-input label="Kadro Türü" v-model="form.collar_type" class="col-span-3" :options="collars"
               id="collar_type" />
        </t-form>
          </t-modal>
    </teleport>

   </template>

<script setup>
import VisitorLayout from '../Layouts/VisitorLayout.vue';
import { ref } from 'vue';

//components
import TButton from '@/Components/TButton.vue';
import TForm from '@/Components/TForm.vue';
import TTextInput from '@/Components/TTextInput.vue';
import TSelectInput from '@/Components/TSelectInput.vue';
import TCheckboInput from '@/Components/TCheckboInput.vue';
import TRadioInput from '@/Components/TRadioInput.vue';
import TModal from '@/Components/TModal.vue';
import TTable from '@/Components/TTable.vue';

const showCreateModal = ref(false);


defineProps({
    tableData:[Array],
})

//Table Headers
const tableHeaders = [
    {
        id:'id',
        label:'ID',
    },
    {
        id:'name',
        label:'Adı Soyadı',
    },
    {
        id:'email',
        label:'E-Mail',
    },
]
//-------------

const calismaAraclari = [
    {
        id:'pc',
        label:'Bilgisayar'
    },
    {
        id:'telefon',
        label:'Telefon'
    },
    {
        id:'araba',
        label:'Araba'
    }
];

const collars = [
{
        id:'white',
        label:'Beyaz Yaka'
    },
    {
        id:'blue',
        label:'Mavi Yaka'
    },
    {
        id:'intern',
        label:'Stajyer'
    },
]


const form = ref({
    name:null,
    email:null,
    provice:null,
    working_tools:[],
    collar_type:'blue',
})

const submitHandle = () =>{
    alert('Submit Edildi');
}

const resetHandle = () =>{
    alert('Resetlendi');
}


const options = [
    {
        id:"adana",
        name:"Adana",
    },
    {
        id:"cankiri",
        name:"Çankırı",
    },
    {
        id:"mugla",
        name:"Muğla",
    },
];



</script>

<style lang="scss" scoped>

</style>
