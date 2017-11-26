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
                            <th>Movimentação</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="( req, index ) in reqindeferidos">
                            <td>{{ index + 1 }}</td>
                            <td>{{req.protocolo}}</td>
                            <td>{{req.data_criacao | data('DD/M/Y')}}</td>
                            <td>{{req.situacao}}</td>
                            <td>{{req.historico[req.historico.length - 1].data_movimentacao.date | data('DD/M/Y')}}</td>
                            <td>{{req.historico[req.historico.length - 1].movimentacao}}</td>
                            <td>
                                <button class="btn btn-xs btn-primary" @click="visualizarRequerimento(req)"><i
                                        class="fa fa-edit"></i> Visualizar
                                </button>
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

        }

    }

</script>