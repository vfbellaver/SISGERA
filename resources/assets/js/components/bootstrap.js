require('./shared/_register');

//MENUS
Vue.component('menu-admin',require('./menu/menu-admin'));

//USERS
Vue.component('users-list',require('./usuario/lista-usuarios'));
Vue.component('lista-coordenadores',require('./usuario/lista-coordenadores'));
Vue.component('lista-alunos',require('./usuario/lista-alunos'));
Vue.component('lista-cerel',require('./usuario/lista-cerel'));
Vue.component('lista-civis',require('./usuario/lista-civis'));
Vue.component('form-user',require('./usuario/form-usuario'));
Vue.component('editar-usuario',require('./usuario/edita-usuario'));
Vue.component('criar-usuario',require('./usuario/criar-usuario'));


//REQUERIMENTO
Vue.component('requerimento-form',require('./requerimento/requerimento-form'));

//OUTROS COMPONENTES
Vue.component('pagination',require('./shared/pagination'));
