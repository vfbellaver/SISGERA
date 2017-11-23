require('./shared/_register');

//MENUS
Vue.component('menu-admin',require('./menu/menu-admin'));

//USERS
Vue.component('users-list',require('./usuario/listas/lista-usuarios'));
Vue.component('lista-coordenadores',require('./usuario/listas/lista-coordenadores'));
Vue.component('lista-alunos',require('./usuario/listas/lista-alunos'));
Vue.component('lista-cerel',require('./usuario/listas/lista-cerel'));
Vue.component('lista-civis',require('./usuario/listas/lista-civis'));

//FORMS
Vue.component('form-user',require('./usuario/form-usuario'));
Vue.component('form-password',require('./usuario/form-password'));
Vue.component('editar-usuario',require('./usuario/edita-usuario'));
Vue.component('criar-usuario',require('./usuario/criar-usuario'));
Vue.component('perfil-usuario',require('./usuario/perfil-usuario'));


//REQUERIMENTO
Vue.component('requerimento-form',require('./requerimento/requerimento-form'));

//OUTROS COMPONENTES
Vue.component('pagination',require('./shared/pagination'));
