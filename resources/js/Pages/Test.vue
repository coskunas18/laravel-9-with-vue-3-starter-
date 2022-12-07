<template>
      <t-content-card @tiklama="bildirim($event)" title="Yaz Bitti"/>
      <t-content-card @tiklama="bildirim($event)" title="Kış Başladı"/>
      <t-content-card @tiklama="bildirim($event)" title="İlkbahara daha var"/>
</template>

<script setup>
import { provide } from 'vue';
provide('mesaj','Merhaba Dünya')

const bildirim = (mesaj) =>{
    alert(mesaj)
}
</script>

<style lang="scss" scoped>

</style>
