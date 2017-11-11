<template>
    <div class="card">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de  Coordenadores</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
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
                    <tr v-for="( coord, index ) in coordenadores">
                        <td>{{ index + 1 }}</td>
                        <td>{{coord.name}}</td>
                        <td>{{coord.email}}</td>
                        <td>Coordenador Curso</td>
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
</template>
<script>

    export default {
        components: {},
        data() {
            return {
                coordenadores: [],
                pagination: {},
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
                        this.coordenadores = response.data;
                        this.pagination  = response;
                    });
            },
            navigate(page){
                Sgs.get(laroute.route('admin.coordenadores',{page:page}))
                    .then((response) => {
                        this.coordenadores = response.data;
                        this.pagination  = response;
                    });
            },
            edit(){

            },
            destroy(){

            }

        }

    }

</script>