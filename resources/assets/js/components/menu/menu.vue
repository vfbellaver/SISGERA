<template>
    <div>
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <menu-admin v-if="regra.name === 'admin'"></menu-admin>
                    <menu-cerel v-else-if="regra.name === 'cerel'"></menu-cerel>
                    <menu-coordenador v-else-if="regra.name === 'coordenador'"></menu-coordenador>
                    <meus-requerimentos v-else-if="regra.name === 'aluno' || regra.name == 'externo'"></meus-requerimentos>
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