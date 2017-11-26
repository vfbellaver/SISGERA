<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
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

    }

</script>