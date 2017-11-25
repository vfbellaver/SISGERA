import moment from 'moment';
import Vue from 'vue';

Vue.filter('data', function (value, pattern) {
    if (!value) {
        return '';
    }
    return moment(String(value)).format(pattern ? pattern : 'MM/DD/YYYY hh:mm');
});