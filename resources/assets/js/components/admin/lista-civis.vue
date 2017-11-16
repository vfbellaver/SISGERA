<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de  Civis</h5>
                </div>
                <div class="ibox-content">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="( civil, index ) in civis">
                            <td>{{ index + 1 }}</td>
                            <td>{{civil.name}}</td>
                            <td>{{civil.email}}</td>
                            <td>
                                <button class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <pagination :source="pagination" @navigate="navigate"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    export default {
        components: {},
        data() {
            return {
                civis: [],
                pagination: {},
                pageHeading: {
                    title: 'Lista Publico Civil',
                    fa: 'fa fa-user',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

        mounted() {
            this.load();
        },

        methods: {
            load(){
                Sgs.get(laroute.route('get-civis'))
                    .then((response) => {

                        this.civis = response.data;
                        this.pagination = response;
                    });

            },
            navigate(page){
                console.log(page);
                Sgs.get(laroute.route('get-civis', {page: page}))
                    .then((response) => {
                        this.civis = response.data;
                        this.pagination = response;
                    });
            },
        }

    }

</script>