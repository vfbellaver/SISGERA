<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de  Alunos</h5>
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
                        <tr v-for="( aluno, index ) in alunos">
                            <td>{{ index + 1 }}</td>
                            <td>{{aluno.name}}</td>
                            <td>{{aluno.email}}</td>
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
                alunos: [],
                pagination: {},
                pageHeading: {
                    title: 'Lista de Alunos',
                    fa: 'fa fa-graduation-cap',
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
                Sgs.get(laroute.route('get-alunos'))
                    .then((response) => {

                        this.alunos = response.data;
                        this.pagination = response;
                    });

            },
            navigate(page){
                console.log(page);
                Sgs.get(laroute.route('get-alunos', {page: page}))
                    .then((response) => {
                        this.alunos = response.data;
                        this.pagination = response;
                    });
            },
        }

    }

</script>