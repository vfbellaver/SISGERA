<template>
    <div>
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="treeview"><a href="#"><i class="fa fa-users"></i><span>Usuarios</span><i
                            class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a :href="usuarios.coordenadores"><i class="fa fa-street-view"></i> Coordenadores</a></li>
                            <li><a :href="usuarios.alunos"><i class="fa fa-graduation-cap"></i> Alunos</a></li>
                            <li><a :href="usuarios.cerel"><i class="fa fa-user-circle-o"></i> Cerel</a></li>
                            <li><a :href="usuarios.civis"><i class="fa fa-user-o"></i> Civis</a></li>
                            <li><a :href="usuarios.novo"><i class="fa fa-user-plus"></i> Novo Usuario</a></li>
                        </ul>
                    </li>
                    <menu-geral></menu-geral>
                </ul>
            </section>
        </aside>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                usuarios: {
                    coordenadores: laroute.route('lista-coordenadores'),
                    alunos: laroute.route('lista-alunos'),
                    cerel: laroute.route('lista-cerel'),
                    civis: laroute.route('lista-civis'),
                    novo: laroute.route('user.create'),
                },

            }
        }
    }
</script>