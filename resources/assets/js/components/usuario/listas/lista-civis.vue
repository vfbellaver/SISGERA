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
                                <button v-show="regra === 'admin'" class="btn btn-xs btn-primary" @click="edit(civil)"><i class="fa fa-edit"></i></button>
                                <button v-show="regra === 'admin'" class="btn btn-xs btn-danger" @click="destroy(civil)"><i class="fa fa-trash"></i></button>
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
                regra: Sisgera.user.role.name,
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
                Sg.get(laroute.route('get-civis'))
                    .then((response) => {

                        this.civis = response.data;
                        this.pagination = response;
                    });

            },
            navigate(page){
                console.log(page);
                Sg.get(laroute.route('get-civis', {page: page}))
                    .then((response) => {
                        this.civis = response.data;
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