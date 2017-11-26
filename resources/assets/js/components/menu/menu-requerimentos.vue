<template>
    <li class="treeview"><a href="#"><i class="fa fa-eye"></i><span>Requirimentos</span><i
            class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a :href="requimento.novo"><i class="fa fa-file-text"></i>Novos Requirimentos</a></li>
            <li><a href="#"><i class="fa fa-share-square-o"></i> Deferidos</a></li>
            <li><a href="#"><i class="fa fa-share-square-o"></i> Indeferidos</a></li>
            <li><a :href="requimento.list"><i class="fa fa fa-list-ol"></i> Listar Todos</a></li>
        </ul>
    </li>
</template>
<script>
    export default {
        data(){
            return {

                requimento: {
                    novo: laroute.route('view-cerel-req-recebidos'),
                    deferidos: laroute.route('view-cerel-req-deferidos'),
                    indeferidos: laroute.route('view-cerel-req-indeferidos'),
                    list: laroute.route('view-cerel-req-list'),
                },

            }
        }
    }
</script>