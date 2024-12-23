import '../css/app.css';
import './bootstrap';
import 'core-js/stable';
import 'primeicons/primeicons.css'


import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createVuetify } from 'vuetify';
import 'vuetify/styles';
import '@mdi/font/css/materialdesignicons.css';
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@fortawesome/fontawesome-free/css/all.css';
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
import '../css/primevue-override.css';
import ToastService from 'primevue/toastservice';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        const vuetify = createVuetify({
            components,
            directives,
          })
        const app = createApp({ render: () => h(App, props) });
        return app
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify)
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                    options: {
                        prefix: 'p',
                        darkModeSelector: 'light',
                        cssLayer: false
                    }
                }
            })
            .use(ToastService)
            .mount(el);

    },
    progress: {
        color: '#4B5563',
    },
});
