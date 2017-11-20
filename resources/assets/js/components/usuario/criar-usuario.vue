<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <form-user></form-user>
    </div>
</template>
<script>

    export default {
        props: {
            user: {required: false},
        },
        data() {
            return {
                pageHeading: {
                    title: 'Novo Usuario',
                    fa: 'fa fa-user-plus',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

    }

</script>


