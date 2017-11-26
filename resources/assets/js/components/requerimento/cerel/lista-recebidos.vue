<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <fieldset class="col-md-12">
                        <legend class="row"><i class="fa fa-list"></i> Novos Requerimentos
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
                        <tr v-for="( req, index ) in recebidos">
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


<style lang="scss" scoped="scoped">

</style>

<script>
    export default {

        props: {},

        components: {},

        computed: {},

        data() {

            return {

                recebidos: [],
                pagination:{},
                pageHeading: {
                    title: 'Requerimentos Recebidos',
                    fa: 'fa fa-refresh',
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

                Sg.get(laroute.route('get-cerel-req-recebidos'))
                    .then((response) => {

                        this.recebidos = response.data;
                        this.pagination = response;
                    });

            },
            navigate(page){
                console.log(page);
                Sg.get(laroute.route('get-cerel-req-recebidos', {page: page}))
                    .then((response) => {
                        this.recebidos = response.data;
                        this.pagination = response;
                    });
            },
        }

    }

</script>