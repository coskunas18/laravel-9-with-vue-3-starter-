<template>
    <visitor-layout :header="header">
        <template #actionArea>
            <t-button label="Personel Listesine Geri Dön" icon="fa-left-long" :link="route('post.index')"
                class="mr-3" />
        </template>
        <!-- Form -->
        <t-form @submited="handleSubmit" @reset="form.reset()">
            <!-- Title -->
            <t-text-input label="Yazı Başlığı" class="col-span-6" v-model="form.name" :errors="v$.name.$errors" id="name" />
            <!--Summary-->
            <t-text-area-input label="Yazı Özeti" class="col-span-6" v-model="form.summary" :errors="v$.summary.$errors"  id="summary" />
            <!--Search Input-->
            <t-search-input class="col-span-6" v-model="form.authors" model="userList" :data="userList"
                :selectedData="selectedUsers" selectedModel="selectedUsers" :errors="v$.authors.$errors" />

            <!--Status-->
            <t-radio-input class="col-span-6" v-model="form.status" :options="statusType" />
        </t-form>
    </visitor-layout>
</template>

<script setup>
import VisitorLayout from '@/Layouts/VisitorLayout.vue';
import TButton from '@/Components/TButton.vue';
import { Inertia } from '@inertiajs/inertia';
import TTextInput from '@/Components/TTextInput.vue';
import TTextAreaInput from '@/Components/TTextAreaInput.vue';
import TRadioInput from '@/Components/TRadioInput.vue';
import TForm from '@/Components/TForm.vue';
import TSearchInput from '@/Components/TSearchInput.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

//Validation
import { useVuelidate } from '@vuelidate/core'
import { required, helpers } from '@vuelidate/validators'




defineProps({
    header: String,
    userList: Array,
    selectedUsers: Array,
})

const form = useForm({
    name: '',
    summary: '',
    authors: [],
    user_id: null,
    status: true,
})

//Rules
const authorsValidation = (value) => {
    return value.length > 0
}
const rules = ref({
    name: { required: helpers.withMessage('Yazı başlığı gereklidir', required) },
    summary: { required: helpers.withMessage('Yazı özeti gereklidir', required) },
    authors: { authorsValidation: helpers.withMessage('En az bir kişi seçiniz', authorsValidation) }

})

const v$ = useVuelidate(rules, form)

const statusType = [
    {
        id: true,
        label: 'Aktif'
    },
    {
        id: 2,
        label: 'Pasif'
    },

]

const handleSubmit = async () => {
    const isValidated = await v$.value.$validate()
    if (!isValidated) return
    form.post(route('post.store'))
}


</script>

<style lang="scss" scoped>

</style>
