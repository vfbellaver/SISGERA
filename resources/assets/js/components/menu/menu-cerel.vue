<template>
    <div>
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <menu-usuarios></menu-usuarios>
                    <menu-requerimentos></menu-requerimentos>
                    <meus-requerimentos></meus-requerimentos>
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
                    externo: laroute.route('lista-externo'),
                    novo: laroute.route('user.create'),
                },

                requimento: {
                    novo: laroute.route('view-cerel-req-recebidos'),
                    despachado: laroute.route('requerimentos-deferidos'),
                    list: laroute.route('view-cerel-req-list'),
                },

            }
        }
    }
</script>