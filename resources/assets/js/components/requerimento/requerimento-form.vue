<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal">
                            <fieldset class="col-md-12">
                                <legend class="row">1) Dados Requerente
                                    <small class="pull-right"><i class="fa fa-calendar"></i> 01/01/2016</small>
                                </legend>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">
                                        <h4><strong>Nome do Requerente:</strong> &nbsp; Vagner Felipe Bellaver</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Email:</strong> &nbsp; vfbellaver@teste.com</h4>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Rg:</strong> &nbsp; 1233123 SEJUSP/MS</h4>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Cpf:</strong> &nbsp; 312.312.313-00</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Tel Fixo:</strong>&nbsp; (67) 3291-8766</h4>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">
                                        <h4><strong>Tel Celular:</strong>&nbsp; (67) 99900-8765</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="nameEstudante"><h4>
                                        <strong>Nome do Estudante:</strong></h4></label>
                                    <div>
                                        <input class="form-control" id="nameEstudante" type="text"
                                               placeholder="Nome Estudante">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">O próprio usuário logado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="curso"><h4>
                                        <strong>Curso:</strong></h4></label>
                                    <input class="form-control" id="curso" type="text"
                                           placeholder="Curso do estudante">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label" for="periodo"><h4>
                                        <strong>Periodo:</strong></h4></label>
                                        <input class="form-control" id="periodo" type="text" name="periodo"
                                               placeholder="Nome Estudante">
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label" for="turno"><h4>
                                        <strong>Turno:</strong></h4></label>
                                    <input class="form-control" id="turno" type="text" name="turno"
                                           placeholder="Turno">
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label" for="turma"><h4>
                                        <strong>Turma:</strong></h4></label>
                                    <input class="form-control" id="turma" type="text" name="turma"
                                           placeholder="Turma">
                                </div>
                            </div>
                            <fieldset class="col-md-12">
                                <legend class="row">2) Tipo de Requerimento</legend>
                            </fieldset>
                            <div class="col-md-12">
                                <tipo-requerimento></tipo-requerimento>
                            </div>
                            <fieldset class="col-md-12">
                                <legend class="row">3) Detalhamento do pedido</legend>
                            </fieldset>
                            <div class="col-md-12">
                                <vue-editor v-model="detalhes"></vue-editor>
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
    import { VueEditor } from 'vue2-editor';
    export default {
        components: {
            TipoRequerimento,
            VueEditor,
        },

        data() {
            return {
                detalhes: '<p>Detalhamento do seu Pedido</p>',
                pageHeading: {
                    title: 'Novo Requerimento',
                    fa: 'fa fa-edit',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },
    }
</script>