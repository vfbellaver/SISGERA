<template>
    <div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de  Coordenadores</h5>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Função</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>
<script>

    export default {
        components: {},
        data() {
            return {
                listaCoordenadores: [],
                clients: [],
                pageHeading: {
                    title: 'Lista de  Usuarios',
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
                Sgs.get(laroute.route('admin.coordenadores'))
                    .then((response) => {
                        this.listaCoordenadores = response;
                    });
            }
        }

    }

</script>