import { createApp } from 'vue';
import router from "./router";
import App from './App.vue';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


createApp(App).use(router).mount("#app");