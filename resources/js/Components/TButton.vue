<template>

    <component @click="$emit('clicked')" :is="link ? Link : 'button'" :href="link"
     class='px-4 py-2 ml-3 mt-3 rounded-lg bg-orange-400 text-black text-white space-x-2 text-base decoration-slate-800
     dark:bg-gray-800 dark:text-white flex w-fit justify-center items-center border border-yellow-800 select-none
      dark:border-slate-400'>

      <!--Icon-->
      <div v-if="icon || $slots.hasOwnProperty('icon')">
        <slot v-if="$slots.hasOwnProperty('icon')" name="icon"/>
        <font-awesome-icon v-else :icon="icon"/>
      </div>
      <!-- Label -->
      <div v-if="(label || $slots.hasOwnProperty('label'))">
        <slot v-if="$slots.hasOwnProperty('label')" name="label" />
        <span v-else v-text="label"></span>
      </div>
    </component>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
 defineProps({
    label:String,
    link:String,
    icon:String,
 })

</script>

<style lang="scss" scoped>

</style>
