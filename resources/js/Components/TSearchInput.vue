<template>
    <div class="flex flex-col relative">
        <!--Input-->
        <input type="text" @input="handleSearch" v-model="searchText" class="border-slate-300 dark:border-transparent rounded-lg
         w-full dark:bg-slate-300/50 pl-10 ">
        <!-- Search Icon -->
        <font-awesome-icon icon="fa-solid fa-magnifying-glass" class="absolute mt-2.5 ml-3 text-slate-300  " />
        <!--Data List-->
        <div v-if="searchText" class="absolute border flex flex-col rounded-lg z-10 mt-10 bg-white text-black"
            ref="target">
            <template v-for="(i, index) in data">
                <div v-if="10 > index" @click="selectItem(i.id)"
                    class="flex justify-between p-2 border-b last:border-b-0 ">
                    <span v-text="i[labelKey]"></span>
                    <div>
                        <font-awesome-icon icon="fa-solid fa-check" mask="fa-solid fa-circle" transform="shrink-3"
                            :class="modelValue.includes(i[valueKey]) ?
                            'text-emerald-500' : 'text-slate-400'" />
                    </div>
                </div>
            </template>
        </div>
        <!-- Selected Items -->
        <div class="flex gap-2 mt-2">
            <template v-for="i in selectedData">
                <div class="flex space-x-2 items-center border p-2 rounded-lg">
                    <span class="text-sm" v-text="i[labelKey]"></span>
                    <font-awesome-icon @click="selectItem(i[valueKey])" icon="fa-solid fa-xmark"
                        class="text-red-500 cursor-pointer" transform="shrink-3" />
                </div>
            </template>
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
import { Inertia } from '@inertiajs/inertia';
import { ref, onUpdated } from 'vue';
import { onClickOutside } from '@vueuse/core';

const target = ref(null)

onClickOutside(target, (event) => searchText.value = '')

const searchText = ref('');

const props = defineProps({
    id: String,
    model: String, //arayınca gelen kişiler string
    selectedModel: String,
    selectedData: Array,
    data: Array, //arayınca gelen kişiler array
    modelValue: Array, //seçilen kişilerin arraydaki hali
    errors: [Object, Array],
    labelKey: {
        type: String,
        default: 'name'
    },
    valueKey: {
        type: String,
        default: 'id',
    }
})

const selectItem = (id) => {
    if (props.modelValue.includes(id)) {
        let index = props.modelValue.findIndex(i => i === id)
        props.modelValue.splice(index, 1)
    } else {
        props.modelValue.push(id);
    }


    Inertia.reload({
        method: 'post',
        data: {
            selected: props.modelValue
        },
        only: [props.selectedModel]
    })
}

const handleSearch = () => {
    Inertia.reload({
        data: {
            searchText: searchText.value,
        },
        only: [props.model]
    })
}

onUpdated(() => {
    if (props.modelValue && props.selectedData.length === 0) {
        Inertia.reload({
            method: 'post',
            data: {
                selected: props.modelValue
            },
            only: [props.selectedModel]
        })
    }
})

</script>

<style lang="scss" scoped>

</style>
