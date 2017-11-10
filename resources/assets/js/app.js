require('./vendor');

import Laroute from './commons/laroute';
import axios from 'axios';
import Vue from 'vue';
import Moment from 'moment';

import Form from './vue/form';
import Http from './vue/http';

window.laroute = Laroute;
window.axios = axios;
window.moment = Moment;
window.Vue = Vue;
window.Sgs = Form;


require('./components/bootstrap');
require('./vue/bootstrap');

window.App = new Vue({
    el: '#app',
});
