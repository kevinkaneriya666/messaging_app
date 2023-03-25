import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'
import Index from './components/index'
import Second from './components/second'

createApp({
    components: { Index,Second }
}).mount('#app')

