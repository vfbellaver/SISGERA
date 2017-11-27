<template>
    <li class="treeview"><a href="#"><i class="fa fa-cogs"></i><span>Sistema</span><i
            class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a :href="usuarios.coordenadores"><i class="fa fa-vcard"></i> Contas</a></li>
            <li><a :href="usuarios.alunos"><i class="fa fa-plus"></i> Nova Conta</a></li>
        </ul>
    </li>
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