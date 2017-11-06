require('./vendor');

import Laroute from './commons/laroute';
import axios from 'axios';
import Vue from 'vue';
import Moment from 'moment';

window.laroute = Laroute;
window.axios = axios;
window.Vue = Vue;
window.moment = Moment;

require('./vue/bootstrap');
require('./components/bootstrap');

window.App = new Vue({
    el: '#app',
});
