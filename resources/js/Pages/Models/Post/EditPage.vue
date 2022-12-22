<template>
    <visitor-layout :header="header">
        <template #actionArea>
            <t-button label="Personel Listesine Geri Dön" icon="fa-left-long" :link="route('post.index')"
                class="mr-3" />
        </template>
        <!-- Form -->
        <t-form @submited="handleUpdate" @reset="form.reset()">
            <!-- Title -->
            <t-text-input class="col-span-6" v-model="form.name" :errors="v$.name.$errors" />
            <!--Search Input-->
            <t-search-input class="col-span-6" v-model="form.authorList" model="userList" :data="userList"
                :selectedData="selectedUsers" selectedModel="selectedUsers" :errors="v$.authorList.$errors" />
            <!--Summary-->
            <t-text-area-input class="col-span-6" v-model="form.summary" :errors="v$.summary.$errors" />
            <!--Status-->
            <t-radio-input class="col-span-6" v-model="form.status" :options="statusType" />
        </t-form>
    </visitor-layout>
</template>

<script setup>
import VisitorLayout from '@/Layouts/VisitorLayout.vue';
import TTable from '@/Components/TTable.vue';
import TButton from '@/Components/TButton.vue';
import { Inertia } from '@inertiajs/inertia';
import TSearchInput from '@/Components/TSearchInput.vue';
import TTextInput from '@/Components/TTextInput.vue';
import TTextAreaInput from '@/Components/TTextAreaInput.vue';
import TRadioInput from '@/Components/TRadioInput.vue';
import TForm from '@/Components/TForm.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

//Validation
import { useVuelidate } from '@vuelidate/core'
import { required, helpers } from '@vuelidate/validators'

const props = defineProps({
    post: Object,
    header: String,
    userList: Array,
    selectedUsers:Array,
})


const form = useForm({
    name: props.post.name,
    summary: props.post.summary,
    authorList: props.post.authorList,
    status: props.post.status,
})


//Rules
const authorsValidation = (value) => {
    return value.length > 0
}
const rules = ref({
    name: { required: helpers.withMessage('Yazı başlığı gereklidir', required) },
    summary: { required: helpers.withMessage('Yazı özeti gereklidir', required) },
    authorList: { authorsValidation: helpers.withMessage('En az bir kişi seçiniz', authorsValidation) }

})

const v$ = useVuelidate(rules, form)



const statusType = [
    {
        id: 1,
        label: 'Aktif'
    },
    {
        id: 2,
        label: 'Pasif'
    },

];

const handleUpdate = async () => {
    const isValidated = await v$.value.$validate();
    if (!isValidated) return
    form.put(route('post.update', props.post.id))
}

</script>

<style lang="scss" scoped>

</style>
