<template>

  <form  @submit.prevent="$emit('submited')" class="mt-3">
    <!-- Header -->
    <div class="leading-3 mb-4">
        <!--Title-->
        <h3 class="text-2xl font-semibold text-black dark:text-white select-none">
            {{ title }}
        </h3>
        <span class="italic text-sm text-black dark:text-white select-none">
            {{ subTitle }}
        </span>
    </div>
    <!-- Content -->
    <div class="grid grid-cols-6 gap-4 ">
        <slot />
    </div>

    <!--Action Button Area-->
    <div class="mt-3">
       <slot v-if="$slots.hasOwnProperty('footer')" name="footer"/>
       <div v-else class="flex space-x-3 justify-end">
        <!-- Reset -->
        <t-button :label="t('command.reset')" @click.prevent="$emit('reset')" class="border-none" />
        <!-- Save -->
        <t-button :label="t('command.submit')" class="dark:bg-teal-900 border-none"  />
       </div>
    </div>
</form>


</template>

<script setup>
import TButton from './TButton.vue';

defineProps({
    title:String,
    subTitle:String,
})
</script>

<style lang="scss" scoped>

</style>
