<script setup>
import {ref} from "vue";
import {Head, Link } from '@inertiajs/inertia-vue3';
import {useI18n} from "vue-i18n";
import Langs from "../Langs/langs";
import TDarkModeChangerVue from "../Components/TDarkModeChanger.vue";

const { t,locale } = useI18n();

const {langs} = Langs();

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    header:String,
});
const loginLabel = ref(t("auth.login"));
const showLangs = ref(false);
const changeLang = (i) =>{
      locale.value = i;
}
</script>

<template>
    <Head title="Welcome" />

    <!-- Container -->
     <div class=" flex w-screen h-screen bg-slate-200 dark:bg-slate-800">
        <!--Sidebar-->
        <div class="bg-red-100 dark:bg-neutral-700 w-[15rem]">
           <span class="flex justify-center font-bold text-center h-16 items-center
            text-2xl text-slate-900 dark:text-white select-none">
            Jetstream Eğitimi
           </span>
        </div>
        <!--Content Wrapper-->
        <div class="flex flex-col w-full">
            <!--Top Bar-->
            <div class=" flex bg-sky-300 dark:bg-gray-600 w-full h-12 items-center justify-between">
                <!--search-->
                <div class="flex items-center justify-center">
                  <input type="text" class="rounded-lg dark:bg-slate-300
                  border-slate-500 outline-offset-4 h-8 w-48 ml-3">
                </div>
                <div class=" flex space-x-5 items-center justify-center ">
                <!-- Auth Links -->
                <div v-if="!$page.props.user">
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-slate-200 no-underline select-none">
                    {{$t('auth.login')}}
                </Link>
                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-slate-200 no-underline select-none">
                    {{$t('auth.register')}}
                </Link>


                </div>
               <!-- Change Language -->
               <div>
                <span class="select-none" @click="showLangs = !showLangs" v-text="$t('langs.'+locale)"></span>
                <p style="margin: 0;padding: 0;" v-if="showLangs">
                <template v-for="i in langs">
                <span @click="changeLang(i.id)" v-if="(locale !== i.id)" v-text="$t('langs.'+i.id)"></span>
                </template>
                </p>
              </div>
               <!-- DARK MODE-->
               <t-dark-mode-changer-vue class="dark:text-gray-300 pr-4 active:scale-90 transition"/>
               </div>
            </div>
          <!-- Header-->
          <div class=" text-black dark:bg-slate-500 h-24 flex  items-center text-xl text-white pl-4 select-none dark:text-white">
             <slot v-if="$slots.hasOwnProperty('header')" name="header"/>
             <span v-else v-text="header" ></span>
          </div>
          <!--Content-->
          <div class="bg-gray-300 dark:bg-gray-600 h-24 flex text-xl text-white h-full">
            <slot />
          </div>
        </div>
     </div>

</template>