require('./shared/_register');

//MENUS
Vue.component('menu-admin',require('./menu/menu-admin'));

//ADMIN
Vue.component('users-list',require('./admin/lista-usuarios'));
Vue.component('lista-coordenadores',require('./admin/lista-coordenadores'));
Vue.component('lista-alunos',require('./admin/lista-alunos'));
Vue.component('lista-cerel',require('./admin/lista-cerel.vue'));
Vue.component('lista-civis',require('./admin/lista-civis.vue'));


//REQUERIMENTO
Vue.component('requerimento-form',require('./requerimento/requerimento-form'));

//OUTROS COMPONENTES
Vue.component('pagination',require('./shared/pagination'));
