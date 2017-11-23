<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <perfil-form :user="this.user"></perfil-form>
        <form-password :user="this.user"></form-password>
    </div>
</template>
<script>
    import PerfilForm from './perfil-form'
    import FormPassword from './form-password'
    export default {

        components: {
          PerfilForm,
          FormPassword,
        },
        props: {
            user: {required: true},
        },
        data() {
            return {
                pageHeading: {
                    title: 'Configurações de Perfil',
                    fa: 'fa fa-cogs',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

    }

</script>