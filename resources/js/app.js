// require('./bootstrap');
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
window.Alpine = Alpine

window.TomSelect = require('tom-select');

Alpine.plugin(persist)
Alpine.start()
