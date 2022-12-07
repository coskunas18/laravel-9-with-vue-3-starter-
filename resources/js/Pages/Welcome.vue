<template>

    <visitor-layout header="Form Komponenti">
        <t-form>
          <label>İsim</label>
           <input type="text">

           <label>Email</label>
           <input type="text">
        </t-form>
    </visitor-layout>
</template>

<script setup>
import VisitorLayout from '../Layouts/VisitorLayout.vue';

//components
import TButton from '@/Components/TButton.vue';
import TForm from '@/Components/TForm.vue';


</script>

<style lang="scss" scoped>

</style>
