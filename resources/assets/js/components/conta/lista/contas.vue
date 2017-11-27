<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <fieldset class="col-md-12">
                        <legend class="row"><i class="fa fa-list"></i> Contas
                            <small class="pull-right">{{new Date | data('DD/M/Y')}} <i class="fa fa-calendar"></i></small>
                        </legend>
                    </fieldset>
                </div>
                <div class="ibox-content">

                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Função</th>
                            <th v-show="regra === 'admin'" >Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="( conta, index ) in contas">
                            <td>{{ index + 1 }}</td>
                            <td>{{conta.name}}</td>
                            <td>{{conta.funcao}}</td>
                            <td>
                                <button class="btn btn-xs btn-primary" @click="edit(conta)"><i class="fa fa-edit"></i></button>
                                <button v-show="regra === 'admin'" class="btn btn-xs btn-danger" @click="destroy(conta)"><i class="fa fa-trash"></i></button>
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
                contas: [],
                regra: Sisgera.user.role.name,
                pagination: {},
                pageHeading: {
                    title: 'Lista de Contas',
                    fa: 'fa fa-vcard',
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
                Sg.get(laroute.route('contas.index'))
                    .then((response) => {

                        this.contas = response.data;
                        this.pagination = response;
                    });

            },
            navigate(page){
                console.log(page);
                Sg.get(laroute.route('contas.index', {page: page}))
                    .then((response) => {
                        this.contas = response.data;
                        this.pagination = response;
                    });
            },

            edit(conta) {
                window.location = laroute.route("contas.edit", {conta: conta.id});
            },

            destroy(conta) {
                const self = this;
                Sg.delete(laroute.route('contas.destroy', {conta: conta.id}),conta.destroyForm)
                    .then(() => {
                        self.removeCoord(conta)
                    });
            },
            removeCoord(conta) {
                this.coordenadores.splice(this.findIndex(conta), 1);
            },

            findIndex(conta) {
                return this.coordenadores.findIndex((_conta) => {
                    return _conta.id === conta.id;
                });
            }
        }

    }

</script>