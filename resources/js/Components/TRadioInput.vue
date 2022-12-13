<template>

    <div class="flex flex-col flex-shrink-0 w-full">
     <!-- Label -->
        <span class="ml-1 text-xl text-black dark:text-white flex justify-center">{{ label }}</span>
        <!-- Input -->
        <div class="relative space-x-2 flex items-center justify-center">
         <!-- Icon -->
            <font-awesome-icon v-if="icon" :icon="icon" class="absolute left-2 top-3 text-slate-600 dark:text-white"/>
            <!-- Input -->
            <template v-for="option in options">
            <input type="radio" class="w-5 h-5 rounded-full" :name="id" :id="option[valueKey]"
               @change="$emit('update:modelValue',$event.target.id)"
               :checked="modelValue === option[valueKey] ? 'checked' : null "   />
            <label class="dark:text-white">
               {{ option[labelKey] }}
            </label>
            </template>

            <!--Clearable Button-->
            <div v-if="clearable && modelValue" class="absolute right-3 bottom-1 cursor-pointer text-slate-600
            dark:text-white"
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
         id:{
            type:String,
            default: () => {
               let i = new Date().getTime()
               return i.toString();
            }
         },
         label:String,
         errors:[Object,Array],
         modelValue:[String,Number,Date],
         icon:String,
         labelKey:{
            type: String,
            default:'label',
         },
         valueKey:{
            type: String,
            default:'id',
         },
         options:[Array,Object],
         clearable:Boolean,
     })
 </script>

 <style lang="scss" scoped>

 </style>
