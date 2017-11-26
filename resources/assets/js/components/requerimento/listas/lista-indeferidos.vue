<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <fieldset class="col-md-12">
                        <legend class="row"><i class="fa fa-list"></i>  Lista de Requerimentos
                            <small class="pull-right">{{new Date | data('DD/M/Y')}} <i class="fa fa-calendar"></i></small>
                        </legend>
                    </fieldset>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Protocolo</th>
                            <th>Data Criacão</th>
                            <th>Situacão</th>
                            <th>Ultima movimentação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="( req, index ) in reqindeferidos">
                            <td>{{ index + 1 }}</td>
                            <td>{{req.protocolo}}</td>
                            <td>{{req.data_criacao | data('DD/M/Y')}}</td>
                            <td>{{req.situacao}}</td>
                            <td></td>
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
                reqindeferidos: [],
                pagination: {},
                pageHeading: {
                    title: 'Requerimentos Indeferidos',
                    fa: 'fa fa-thumbs-down',
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
                Sg.get(laroute.route('meus-req-indeferidos'))
                    .then((response) => {

                        this.reqindeferidos = response.data;
                        this.pagination = response;
                    });

            },
            navigate(page){
                console.log(page);
                Sg.get(laroute.route('meus-req-indeferidos', {page: page}))
                    .then((response) => {
                        this.reqindeferidos = response.data;
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