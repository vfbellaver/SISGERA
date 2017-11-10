<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <coord-list></coord-list>
        <alunos-list></alunos-list>
    </div>
</template>
<script>

    export default {
        components: {},
        data() {
            return {
                pageHeading: {
                    title: 'Lista de  Usuarios',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

        mounted() {

        },

        methods: {}

    }

</script>