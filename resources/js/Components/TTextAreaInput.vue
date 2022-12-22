<template>

   <div class="flex flex-col flex-shrink-0 w-full">
    <!-- Label -->
       <label class="ml-1 text-xl text-black dark:text-white">{{ label }}</label>
       <!-- Input -->
       <div class="relative">
        <!-- Icon -->
           <font-awesome-icon v-if="icon" :icon="icon" class="absolute left-2 top-3 text-slate-600 dark:text-white"/>
           <!-- Input -->
           <textarea  class="text-black dark:text-white rounded-lg border-slate-600 dark:border-transparent dark:bg-slate-300/50 w-full"
           :value="modelValue" @input="$emit('update:modelValue',$event.target.value)" :class="icon ? 'pl-10' : '' " />
           <!--Clearable Button-->
           <div v-if="clearable && modelValue" class="absolute right-3 bottom-1 cursor-pointer text-slate-600 dark:text-white"
            @click="$emit('update:modelValue','')">
            <font-awesome-icon icon="fa-solid fa-xmark" transform="shrink-2"  mask="fa-solid fa-circle" />
           </div>
       </div>
       <!-- Error Message -->
       <div v-if="errors">
        <template v-for="i in errors">
            <span class="text-sm italic text-red-400">{{ i.hasOwnProperty('$message') ? i.$message : i }}</span>
        </template>

       </div>
   </div>
</template>

<script setup>
    defineProps({
        id:String,
        label:String,
        errors:[Object,Array],
        modelValue:[String,Number,Date],
        icon:String,
        clearable:Boolean,
    })
</script>

<style lang="scss" scoped>

</style>
