<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <form-conta></form-conta>
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
                    title: 'Criando Conta',
                    fa: 'fa fa-vcard',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

    }

</script>


