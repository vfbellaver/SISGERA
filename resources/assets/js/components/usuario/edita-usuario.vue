<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <form-user :user="this.user"></form-user>
    </div>
</template>
<script>

    export default {
        props: {
          user: {required: true},
        },
        data() {
            return {
                pageHeading: {
                    title: 'Atualização de Usuario',
                    fa: 'fa fa-edit',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

    }

</script>