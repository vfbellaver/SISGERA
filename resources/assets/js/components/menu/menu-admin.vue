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
                    <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Requerimentos</span><i
                            class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a :href="requerimento.novo"><i class="fa fa-plus-circle"></i> Novo Requerimento</a></li>
                            <li><a :href="requerimento.enviado"><i class="fa fa-send"></i> Enviados</a></li>
                            <li><a :href="requerimento.recebido"><i class="fa fa-refresh"></i> Em andamento</a></li>
                            <li><a :href="requerimento.deferido"><i class="fa fa-thumbs-up"></i> Deferidos</a></li>
                            <li><a :href="requerimento.indeferido"><i class="fa fa-thumbs-down"></i> Indeferidos</a></li>
                        </ul>
                    </li>
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
                requerimento: {
                    novo: laroute.route('requerimento.create'),
                    enviado: laroute.route('requerimentos-enviados'),
                    recebido: laroute.route('requerimentos.recebidos'),
                    deferido: laroute.route('requerimentos.deferidos'),
                    indeferido: laroute.route('requerimentos.indeferidos'),
                },


            }
        }
    }
</script>