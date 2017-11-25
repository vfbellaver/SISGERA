<template>
    <div>
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <menu-admin v-if="regra.name === 'admin'"></menu-admin>
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