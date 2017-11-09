require('./vendor');

import Laroute from './commons/laroute';
import axios from 'axios';
import Vue from 'vue';
import Moment from 'moment';


window.laroute = Laroute;
window.axios = axios;
window.moment = Moment;
window.Vue = Vue;

require('./components/bootstrap');

window.App = new Vue({
    el: '#app',
});
