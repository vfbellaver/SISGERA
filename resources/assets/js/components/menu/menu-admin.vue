<template>
    <div>
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="treeview"><a href="#"><i class="fa fa-users"></i><span>Usuarios</span><i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="fa fa-street-view"></i> Coordenadores</a></li>
                            <li><a href=""><i class="fa fa-graduation-cap"></i> Alunos</a></li>
                            <li><a href=""><i class="fa fa-user-circle-o"></i> Cerel</a></li>
                            <li><a href=""><i class="fa fa-user-o"></i> Civis</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Requerimentos</span><i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a :href="novoRequerimento"><i class="fa fa-street-view"></i> Novo Requerimento</a></li>
                            <li><a href=""><i class="fa fa-graduation-cap"></i> Em andamento</a></li>
                            <li><a href=""><i class="fa fa-user-circle-o"></i> Deferidos</a></li>
                            <li><a href=""><i class="fa fa-user-o"></i> Indeferidos</a></li>
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
                novoRequerimento: laroute.route('requerimento.create')
            }
        }
    }
</script>