<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <fieldset class="col-md-12">
                        <legend class="row"><i class="fa fa-list"></i> Coordenadores
                            <small class="pull-right">{{new Date | data('DD/M/Y')}} <i class="fa fa-calendar"></i></small>
                        </legend>
                    </fieldset>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Função</th>
                            <th>Status</th>
                            <th v-show="regra === 'admin'">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="( coord, index ) in coordenadores">
                            <td>{{ index + 1 }}</td>
                            <td>{{coord.name}}</td>
                            <td>{{coord.email}}</td>
                            <td>Coordenador Curso</td>
                            <td>{{coord.status ? 'Ativo' : 'Inativo'}}</td>
                            <td>
                                <button v-show="regra === 'admin'" class="btn btn-xs btn-primary" @click="edit(coord)"><i class="fa fa-edit"></i></button>
                                <button v-show="regra === 'admin'" class="btn btn-xs btn-danger" @click="destroy(coord)"><i class="fa fa-trash"></i></button>
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
                coordenadores: [],
                regra: Sisgera.user.role.name,
                pagination: {},
                pageHeading: {
                    title: 'Lista de  Coordenadores',
                    fa:'fa fa-graduation-cap',
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
                Sg.get(laroute.route('get-coordenadores'))
                    .then((response) => {
                        this.coordenadores = response.data;
                        this.pagination = response;
                    });
            },
            navigate(page){
                Sg.get(laroute.route('get-coordenadores', {page: page}))
                    .then((response) => {
                        this.coordenadores = response.data;
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