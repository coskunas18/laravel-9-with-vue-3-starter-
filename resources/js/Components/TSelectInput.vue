<template>

    <div class="flex flex-col flex-shrink-0 w-full">
     <!-- Label -->
        <label class="ml-1 text-xl text-black dark:text-white">{{ label }}</label>
        <!-- Input -->
        <div class="relative">
         <!-- Icon -->
            <font-awesome-icon v-if="icon" :icon="icon" class="absolute left-2 top-3"/>
            <!-- Select Input -->
           <select class="bg-gray-50 border border-gray-300 text-black input rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-300/50 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
            @change="$emit('update:modelValue',$event.target.value)">
            <option value="" class="text-slate-500">{{ placeholder }}</option>
             <!-- Options -->
             <template v-for="option in options">
             <option :value="option[valueKey]" :selected="modelValue == option[valueKey] ? 'selected' : null  ">
             {{ option[labelKey] }}</option>

            </template>
           </select>
            <!--Clearable Button-->
            <div v-if="clearable && modelValue" class="absolute right-8 bottom-2 cursor-pointer"
             @click="$emit('update:modelValue','')">
             <font-awesome-icon icon="fa-solid fa-xmark" transform="shrink-2"  mask="fa-solid fa-circle" />
            </div>
        </div>
        <!-- Error Message -->
        <div v-if="errors">
         <template v-for="i in errors">
             <span class="text-sm italic text-red-400">{{ i }}</span>
         </template>
        </div>
    </div>
 </template>

 <script setup>
     defineProps({
        id:String,
         label:String,
         errors:[Object,Array],
         modelValue:[String,Number,Date,Boolean],
         icon:String,
         clearable:Boolean,
         options:[Object,Array],
         valueKey:{
          type:String,
          default:'id',
         },
         labelKey:{
            type:String,
            default:'label',
         },
         placeholder:{
            type:String,
            default:'Seçiniz...',
         },
     })
 </script>

 <style lang="scss" scoped>

 </style>
