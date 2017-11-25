<template>
    <div>
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <menu-admin v-if="regra.name == 'admin'"></menu-admin>
                    <menu-geral v-if="regra.name == 'aluno' || regra.name == 'civil'"></menu-geral>
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