<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <fieldset class="col-md-12">
                        <legend class="row"><i class="fa fa-list"></i> Servidores Cerel
                            <small class="pull-right">{{new Date | data('DD/M/Y')}} <i class="fa fa-calendar"></i></small>
                        </legend>
                    </fieldset>
                </div>
                <div class="ibox-content">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Função</th>
                            <th v-show="regra === 'admin'" >Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="( cerel, index ) in cerel">
                            <td>{{ index + 1 }}</td>
                            <td>{{cerel.name}}</td>
                            <td>{{cerel.email}}</td>
                            <td>{{cerel.conta.funcao}}</td>
                            <td>
                                <button v-show="regra === 'admin'" class="btn btn-xs btn-primary" @click="edit(cerel)"><i class="fa fa-edit"></i></button>
                                <button v-show="regra === 'admin'" class="btn btn-xs btn-danger" @click="destroy(cerel)"><i class="fa fa-trash"></i></button>
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
                cerel: [],
                pagination: {},
                regra: Sisgera.user.role.name,
                pageHeading: {
                    title: 'Lista de Servidores Cerel',
                    fa: 'fa fa-user-o',
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
                Sg.get(laroute.route('get-cerel'))
                    .then((response) => {

                        this.cerel = response.data;
                        this.pagination = response;
                    });

            },
            navigate(page){
                console.log(page);
                Sg.get(laroute.route('get-cerel', {page: page}))
                    .then((response) => {
                        this.cerel = response.data;
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