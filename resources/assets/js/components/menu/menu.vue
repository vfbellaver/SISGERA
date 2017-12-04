<template>
    <div>
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <menu-admin v-show="regra.name === 'admin'"></menu-admin>
                    <menu-cerel v-show="regra.name === 'cerel'"></menu-cerel>
                    <menu-coordenador v-show="regra.name === 'coordenador'"></menu-coordenador>
                    <meus-requerimentos v-show="regra.name === 'aluno' || regra.name == 'civil'"></meus-requerimentos>
                </ul>
            </section>
        </aside>
    </div>
</template>
<script>
    export default {
        props: {
            regra: {required: true},
        }

    }
</script>