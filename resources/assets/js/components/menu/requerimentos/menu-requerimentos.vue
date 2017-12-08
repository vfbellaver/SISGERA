<template>
    <li class="treeview"><a href="#"><i class="fa fa-eye"></i><span>Todos Requerimentos</span><i
            class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a :href="requimento.novo"><i class="fa fa-file-text"></i>Novos Requerimentos</a></li>
            <li><a :href="requimento.emandamento"><i class="fa fa-refresh"></i>Em andamento</a></li>
            <li><a :href="requimento.deferidos"><i class="fa fa-handshake-o"></i> Deferidos</a></li>
            <li><a :href="requimento.parcialmente"><i class="fa fa-thumbs-up"></i> Deferidos Parcialmente</a></li>
            <li><a :href="requimento.indeferidos"><i class="fa fa-thumbs-down"></i> Indeferidos</a></li>
            <li><a :href="requimento.list"><i class="fa fa fa-list-ol"></i> Listar Todos</a></li>
        </ul>
    </li>
</template>
<script>
    export default {
        data(){
            return {

                requimento: {
                    novo: laroute.route('view-req-enviados'),
                    emandamento: laroute.route('view-req-recebidos'),
                    deferidos: laroute.route('view-req-deferidos'),
                    parcialmente: laroute.route('view-req-deferidos-parcialmente'),
                    indeferidos: laroute.route('view-req-indeferidos'),
                    list: laroute.route('view-req-list'),
                },

            }
        }
    }
</script>