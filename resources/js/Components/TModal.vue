<template>
    <!-- Wrapper -->
    <div v-if="modelValue" class="fixed flex justify-center items-center  top-0 left-0 h-screen w-screen bg-slate-800/40">
     <!-- Modal -->
     <div class="bg-gray-300 dark:bg-gray-600 rounded-lg min-w-[50rem] p-4 relative" ref="target">

        <!-- Close Button-->
        <font-awesome-icon @click="$emit('update:modelValue',false)" icon="fa-solid fa-xmark" mask="fa-solid fa-circle"
         transform="shrink-4" size="xl"
         class="text-red-800  absolute right-3 top-2 hover:scale-110 active:scale-90 cursor-pointer" />
        <slot/>
     </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { onClickOutside } from '@vueuse/core'

const emit = defineEmits(['update:modelValue'])

const target = ref(null)

onClickOutside(target, (event) => emit('update:modelValue',false))

defineProps({
    modelValue:Boolean,
    title:String,
})
</script>

<style lang="scss" scoped>

</style>
