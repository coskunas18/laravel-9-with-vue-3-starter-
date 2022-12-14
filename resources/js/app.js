import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createPinia } from 'pinia'

//pinia
const pinia = createPinia()

//fontawsome components
import { FontAwesomeIcon, FontAwesomeLayers, FontAwesomeLayersText } from '@fortawesome/vue-fontawesome'
import "./sources/icons.js";

//i18n Language Package
import {createI18n} from 'vue-i18n';
import Langs from "./Langs/langs.js"
export const i18n = createI18n({
    legacy: false,
    locale: 'tr', // set locale
    fallbackLocale:'en',
    messages:{
        ...Langs().translates
    }

  })


//Components

import TContentCard from "@/Components/TContentCard.vue";


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {

    const App = createApp({ render: () => h(app, props) })
      App.config.globalProperties.t=i18n.global.t;
    return App
            .component('font-awesome-icon', FontAwesomeIcon)
            .component('TContentCard',TContentCard)
            .use(pinia)
            .use(i18n)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
