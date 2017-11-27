<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <form-conta :conta="conta"></form-conta>
    </div>
</template>
<script>

    export default {
        props: {
            conta: {required: true},
        },
        data() {
            return {
                pageHeading: {
                    title: 'Editando informacões da Conta',
                    fa: 'fa fa-edit',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

    }

</script>