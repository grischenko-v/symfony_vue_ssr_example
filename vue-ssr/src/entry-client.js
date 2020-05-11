import { createApp } from './main.js';

const { app } = createApp(window.__INITIAL_STATE__);

// this assumes App.vue template root element has `id="app"`
app.$mount('#app');
