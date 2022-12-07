<template>
    {{ gelenMesaj }}
    <div class="border flex flex-col p-3 rounded-lg">
        <!-- Header-->
         <div class="mb-4" @click="$emit('tiklama','Merhaba dünya')">
            <h3 class="font-bold">
                <span v-if="title" v-text="title"></span>
                <slot v-else name="title"></slot>
            </h3>
         </div>
         <!-- Content -->
         <div class="mb-4">
                <slot name="description"></slot>
         </div>
         <!-- Footer -->
         <div class="flex justify-end mr-4">
            <slot name="footer"></slot>
         </div>
    </div>
</template>

<script setup>
import { inject } from "vue"

const gelenMesaj = inject('mesaj')

 defineProps({
    title: String
 })
</script>

<style lang="scss" scoped>

</style>
