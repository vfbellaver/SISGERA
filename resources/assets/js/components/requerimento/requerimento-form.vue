<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal" v-model="form" @submit="save">
                            <fieldset class="col-md-12">
                                <legend class="row">1) Dados Requerente
                                    <small class="pull-right"><i class="fa fa-calendar"></i> 01/01/2016</small>
                                </legend>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">
                                        <h4><strong>Nome do Requerente:</strong> &nbsp {{user.name}}</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Email:</strong> &nbsp {{user.email}}</h4>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Rg:</strong> &nbsp {{user.rg}} &nbsp {{user.org_emissor}}</h4>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Cpf:</strong> &nbsp {{user.cpf}}</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Tel Fixo:</strong>&nbsp {{user.telefone}} </h4>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Tel Celular:</strong>&nbsp {{user.celular}}</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="nameEstudante"><h4>
                                        <strong>Nome do Estudante:</strong></h4></label>
                                    <div>
                                        <input class="form-control" id="nameEstudante" type="text" name="nome_estudante"
                                               placeholder="Nome Estudante" v-model="form.nome_estudante">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" v-model="checked" @click="setEstudante">O próprio usuário logado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="curso"><h4>
                                        <strong>Curso:</strong></h4></label>
                                    <input class="form-control" id="curso" type="text" name="curso"
                                           placeholder="Curso do estudante" v-model="form.curso">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label" for="periodo"><h4>
                                        <strong>Periodo:</strong></h4></label>
                                    <input class="form-control" id="periodo" type="text" name="periodo"
                                           placeholder="Nome Estudante" v-model="form.periodo">
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label" for="turno"><h4>
                                        <strong>Turno:</strong></h4></label>
                                    <input class="form-control" id="turno" type="text" name="turno"
                                           placeholder="Turno" v-model="form.turno">
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label" for="turma"><h4>
                                        <strong>Turma:</strong></h4></label>
                                    <input class="form-control" id="turma" type="text" name="turma"
                                           placeholder="Turma" v-model="form.turma">
                                </div>
                            </div>
                            <fieldset class="col-md-12">
                                <legend class="row">2) Tipo de Requerimento</legend>
                            </fieldset>
                            <div class="col-md-12">
                                <tipo-requerimento v-model="form.tipos_requerimento "></tipo-requerimento>
                            </div>
                            <fieldset class="col-md-12">
                                <legend class="row">3) Detalhamento do pedido</legend>
                            </fieldset>
                            <div class="col-md-12">
                                <vue-editor v-model="form.detalhamento"></vue-editor>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped="scoped">
    fieldset {
        margin-top: 15px;
    }
</style>
<script>
    import TipoRequerimento from './tipos-requerimentos';
    import {VueEditor} from 'vue2-editor';
    export default {
        components: {
            TipoRequerimento,
            VueEditor,
        },
        props: {
            user: {required: true}
        },

        data() {
            return {
                detalhes: '<p>Detalhamento do seu Pedido</p>',
                form: {},
                checked: false,
                pageHeading: {
                    title: 'Novo Requerimento',
                    fa: 'fa fa-edit',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

        mounted(){
            this.form = this.createForm();
        },

        methods: {
            createForm(requerimento) {
                return new Form({
                    id: requerimento ? requerimento.id : null,
                    nome_estudante: requerimento ? requerimento.nome_estudante : null,
                    tipos_requerimento: [],
                    curso: requerimento ? requerimento.curso : null,
                    turno: requerimento ? requerimento.turno : null,
                    turma: requerimento ? requerimento.turma : null,
                    detalhamento: requerimento ? requerimento.detalhamento : null,
                });
            },
            setEstudante(){
                this.checked = !this.checked;
                if(this.checked){
                    this.form.nome_estudante = this.user.name;
                }else{
                    this.form.nome_estudante = null;
                }
            },

            save(){

            },
        }
    }
</script>