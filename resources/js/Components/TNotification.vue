<template>
    <div class="fixed right-10 bottom-7 select-none space-y-2 py-4">
      <!-- Notification Body -->
       <transition-group name="fade">
           <template v-for="i in notifications" :key="i.id" >
             <div v-if="i.id === i._token" class="relative p-4 rounded-lg text-white" :class="types[i.type]">
              <!-- Content -->
              <span v-text="i.content"></span>
              <!-- Delete Button -->
              <font-awesome-icon @click="notification.delete(i)"  icon="fa-solid fa-xmark" mask="fa-solid fa-circle" transform="shrink-3"
               size="lg" class="absolute -top-1 -right-2 cursor-pointer hover:scale-110 active:scale-90"/>
            </div>
            </template>
       </transition-group>
    </div>
</template>

<script setup>
  import {useNotification} from "@/stores/useNotification.js";
  import {storeToRefs} from "pinia";

  const notification = useNotification();
  const { notifications } = storeToRefs(notification)

  const types={
    success:'bg-green-800',
    danger:'bg-red-700',
    warning:'bg-yellow-600',
    info:'bg-sky-900',
    default:'bg-cyan-500',

  }
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: all 250ms ease-in-out;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateX(30px);
}
</style>
