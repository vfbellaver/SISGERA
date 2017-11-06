import _ from 'lodash';
window._ = _;

import jQUery from 'jquery';
window.$ = window.jQuery = jQUery;

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

require('bootstrap-sass');