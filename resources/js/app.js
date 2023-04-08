import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


Alpine.start();

import { createApp } from 'vue'
import Index from './components/index'
import Second from './components/second'
import Third from './components/third'

var app = createApp({
    components: { Index,Second,Third }
}).mount('#app')
