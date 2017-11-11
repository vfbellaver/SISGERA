require('./shared/_register');

//MENUS
Vue.component('menu-admin',require('./menu/menu-admin'));

//ADMIN
Vue.component('users-list',require('./admin/lista-usuarios'));
Vue.component('coord-list',require('./admin/lista-coordenadores'));
Vue.component('alunos-list',require('./admin/lista-alunos'));


//REQUERIMENTO
Vue.component('requerimento-form',require('./requerimento/requerimento-form'));


//OUTROS COMPONENTES
Vue.component('pagination',require('./shared/pagination'));
