require('./vendor');
require('./main');

import Laroute from './commons/laroute';
import axios from 'axios';
import Vue from 'vue';
import Moment from 'moment';
import swal from 'sweetalert';

import Form from './vue/form';


window.laroute = Laroute;
window.axios = axios;
window.moment = Moment;
window.Vue = Vue;
window.Sgs = Form;
window.swal = swal;


require('./components/bootstrap');
require('./vue/bootstrap');

window.App = new Vue({
    el: '#app',
});
