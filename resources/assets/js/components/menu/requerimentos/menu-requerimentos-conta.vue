<template>
    <li class="treeview"><a href="#"><i class="fa fa-vcard"></i><span>Requerimentos @{conta.name}</span><i
            class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a :href="requimento.novo"><i class="fa fa-file-text"></i>Novos Requerimentos</a></li>
            <li><a :href="requimento.deferidos"><i class="fa fa-handshake-o"></i> Deferidos</a></li>
            <li><a :href="requimento.parcialmente"><i class="fa fa-thumbs-up"></i> Deferidos Parcialmente</a></li>
            <li><a :href="requimento.indeferidos"><i class="fa fa-thumbs-down"></i> Indeferidos</a></li>
        </ul>
    </li>
</template>
<script>
    export default {
        props: {
          conta:{required:true},
        },
        data(){
            return {

                requimento: {
                    novo: laroute.route('conta-req-andamento'),
                    deferidos: laroute.route('conta-req-deferidos'),
                    parcialmente: laroute.route('conta-req-deferidos-parcialmente'),
                    indeferidos: laroute.route('conta-req-indeferidos'),
                },

            }
        }
    }
</script>