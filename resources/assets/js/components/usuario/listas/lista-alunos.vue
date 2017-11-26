<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de  Alunos</h5>
                </div>
                <div class="ibox-content">

                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th v-show="regra === 'admin'" >Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="( aluno, index ) in alunos">
                            <td>{{ index + 1 }}</td>
                            <td>{{aluno.name}}</td>
                            <td>{{aluno.email}}</td>
                            <td>
                                <button class="btn btn-xs btn-primary" @click="edit(aluno)"><i class="fa fa-edit"></i></button>
                                <button v-show="regra === 'admin'" class="btn btn-xs btn-danger" @click="destroy(aluno)"><i class="fa fa-trash"></i></button>
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
                regra: Sisgera.user.role.name,
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
                Sg.get(laroute.route('get-alunos'))
                    .then((response) => {

                        this.alunos = response.data;
                        this.pagination = response;
                    });

            },
            navigate(page){
                console.log(page);
                Sg.get(laroute.route('get-alunos', {page: page}))
                    .then((response) => {
                        this.alunos = response.data;
                        this.pagination = response;
                    });
            },

            edit(coord) {
                window.location = laroute.route("user.edit", {user: coord.id});
            },

            destroy(coord) {
                const self = this;
                Sg.delete(laroute.route('user.destroy', {user: coord.id}),coord.destroyForm)
                    .then(() => {
                        self.removeCoord(coord)
                    });
            },
            removeCoord(coord) {
                this.coordenadores.splice(this.findIndex(coord), 1);
            },

            findIndex(coord) {
                return this.coordenadores.findIndex((_coord) => {
                    return _coord.id === coord.id;
                });
            }
        }

    }

</script>