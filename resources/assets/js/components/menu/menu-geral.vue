<template>
    <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Meus Requerimentos</span><i
            class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a :href="requerimento.novo"><i class="fa fa-plus-circle"></i> Novo Requerimento</a></li>
            <li><a :href="requerimento.enviado"><i class="fa fa-send"></i> Enviados</a></li>
            <li><a :href="requerimento.recebido"><i class="fa fa-refresh"></i> Em andamento</a></li>
            <li><a :href="requerimento.deferido"><i class="fa fa-thumbs-up"></i> Deferidos</a></li>
            <li><a :href="requerimento.indeferido"><i class="fa fa-thumbs-down"></i> Indeferidos</a></li>
        </ul>
    </li>

</template>
<script>
    export default {
        data(){
            return {
                requerimento: {
                    novo: laroute.route('requerimento.create'),
                    enviado: laroute.route('requerimentos-enviados'),
                    recebido: laroute.route('requerimentos-recebidos'),
                    deferido: laroute.route('requerimentos-deferidos'),
                    indeferido: laroute.route('requerimentos-indeferidos'),
                },


            }
        }
    }
</script>