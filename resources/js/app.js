import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';

window.Alpine = Alpine;
Alpine.start();

// Import Vue components
import LandingPage from './components/LandingPage.vue';
import UserManagement from './components/UserManagement.vue';

// Initialize Vue components
const app = createApp({});

app.component('landing-page', LandingPage);
app.component('user-management', UserManagement);

// Mount Vue to elements with data-vue attribute
document.addEventListener('DOMContentLoaded', () => {
    const vueElements = document.querySelectorAll('[data-vue]');
    vueElements.forEach(el => {
        createApp({
            components: {
                LandingPage,
                UserManagement,
            }
        }).mount(el);
    });
});
