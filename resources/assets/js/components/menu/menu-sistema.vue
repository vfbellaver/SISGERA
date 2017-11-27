<template>
    <li class="treeview"><a href="#"><i class="fa fa-cogs"></i><span>Sistema</span><i
            class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a :href="contas.listacontas"><i class="fa fa-vcard"></i> Contas</a></li>
            <li><a :href="contas.novaconta"><i class="fa fa-plus"></i> Nova Conta</a></li>
        </ul>
    </li>
</template>
<script>
    export default {
        data(){
            return {
                contas: {
                    listacontas: laroute.route('lista-contas'),
                    novaconta: laroute.route('contas.create'),
                },

            }
        }
    }
</script>