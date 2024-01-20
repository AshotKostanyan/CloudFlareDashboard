import "preline/preline";
import './bootstrap';
import '../css/app.css';

import "vue3-json-viewer/dist/index.css";

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import JsonViewer from "vue3-json-viewer";
import CanvasJSChart from '@canvasjs/vue-charts';



const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => { 
        setTimeout(() => {
            window.HSStaticMethods.autoInit();
        }, 100)

        return resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(JsonViewer)
            .use(CanvasJSChart)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

// document.addEventListener('inertia:finish', (event) => {
//     setTimeout(() => {
//         window.HSStaticMethods.autoInit();
//     }, 100)
// })