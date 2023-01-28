import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'
import Index from './components/index'

createApp({
    components: { Index }
}).mount('#app')

