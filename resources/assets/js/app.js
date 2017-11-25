require('./vendor');
require('./main');

import Laroute from './commons/laroute';
import axios from 'axios';
import Vue from 'vue';
import Moment from 'moment';
import swal from 'sweetalert';
import Sisgera from './vue/http';

window.laroute = Laroute;
window.moment = Moment;
window.swal = swal;
window.Vue = Vue;
window.Sg = Sisgera;

require('./filtros/data');
require('./components/bootstrap');
require('./vue/bootstrap');

window.EventBus = window.Bus = new Vue();

window.App = new Vue({
    el: '#app',
    data() {
        return {
            user: 'Sg' in window ? Sg.user : null,
        }
    },
    created() {
        console.log("App Created");
        let self = this;

        EventBus.$on(['loadCurrentUser', 'userUpdated'], () => {
            axios.get(laroute.route('current.user '))
                .then(response => {
                    self.user = response.data;
                });
        });

        EventBus.$on('settingsUpdated', () => {
            axios.get(laroute.route('user.current.settings'))
                .then(response => {
                    debugger;
                    self.user = response.data;
                });
        });
    },
});
