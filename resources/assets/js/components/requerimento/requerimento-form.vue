<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <row>
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal" v-model="formRequerimento" @submit.prevent="save">
                            <fieldset class="col-md-12">
                                <legend class="row">1) Dados Requerente
                                    <small class="pull-right">{{new Date | data('DD/M/Y') }} <i class="fa fa-calendar"></i> </small>
                                </legend>
                            </fieldset>
                            <informacoes-usuario :user="this.user"></informacoes-usuario>
                            <row>
                                <column size="12">
                                    <form-group :form="formRequerimento" field="nome_estudante">
                                        <label class="control-label" for="nome_estudante"><h4>
                                            <strong>Nome do Estudante:</strong></h4></label>
                                        <div>
                                            <input class="form-control" id="nome_estudante" type="text"
                                                   name="nome_estudante"
                                                   placeholder="Nome Estudante"
                                                   v-model="formRequerimento.nome_estudante">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" v-model="checked" @click="setEstudante">O próprio usuário logado
                                                </label>
                                            </div>
                                        </div>
                                    </form-group>
                                </column>
                            </row>

                            <row>
                                <column size="6">
                                    <form-group :form="formRequerimento" field="curso">
                                        <label class="control-label" for="curso"><h4>
                                            <strong>Curso:</strong></h4></label>
                                        <input class="form-control" id="curso" type="text" name="curso"
                                               placeholder="Curso do estudante" v-model="formRequerimento.curso">
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="formRequerimento" field="turma">
                                        <label class="control-label" for="turma"><h4>
                                            <strong>Turma:</strong></h4></label>
                                        <input class="form-control" id="turma" type="text" name="turma"
                                               placeholder="Turma" v-model="formRequerimento.turma">
                                    </form-group>
                                </column>
                            </row>

                            <row>
                                <column size="6">
                                    <form-group :form="formRequerimento" field="periodo">
                                        <label class="control-label" for="periodo"><h4>
                                            <strong>Periodo:</strong></h4></label>
                                        <input class="form-control" id="periodo" type="text" name="periodo"
                                               placeholder="Informe o periodo" v-model="formRequerimento.periodo">
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="formRequerimento" field="turno">
                                        <label class="control-label" for="turno"><h4>
                                            <strong>Turno:</strong></h4></label>
                                        <input class="form-control" id="turno" type="text" name="turno"
                                               placeholder="Turno" v-model="formRequerimento.turno">
                                    </form-group>
                                </column>

                            </row>

                            <row>
                                <column size="12">
                                    <form-group :form="formRequerimento" field="anexo">
                                        <fieldset class="col-md-12">
                                            <legend class="row">2) Tipo de Requerimento</legend>
                                        </fieldset>
                                        <column size="12">
                                            <tipo-solicitacao v-model="formRequerimento.tipos_solicitacao"></tipo-solicitacao>
                                        </column>
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <form-group :form="formRequerimento" field="justificativa">

                                        <fieldset class="col-md-12">
                                            <legend class="row">3) Detalhamento do pedido</legend>
                                        </fieldset>
                                        <row>
                                            <column size="12">
                                                <vue-editor v-model="formRequerimento.justificativa" :editorToolbar="customToolbar"></vue-editor>
                                            </column>
                                        </row>
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <form-group :form="formRequerimento" field="anexo_url">

                                        <fieldset class="col-md-12">
                                            <legend class="row">4) Anexar arquivo</legend>
                                        </fieldset>
                                        <column size="6">
                                            <anexo-upload v-model="formRequerimento.anexo_url" id="anexo"></anexo-upload>
                                        </column>
                                    </form-group>
                                </column>
                            </row>
                            <br>
                            <row>
                                <column size="12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <a class="btn btn-default icon-btn"><i
                                                    class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary icon-btn" type="submit"><i
                                                    class="fa fa-fw fa-lg fa-send"></i>Enviar Requerimento
                                            </button>
                                        </div>
                                    </div>
                                </column>
                            </row>
                        </form>
                    </div>
                </div>
            </row>
        </div>
    </div>
</template>
<style lang="scss" scoped="scoped">
    fieldset {
        margin-top: 15px;
    }
</style>
<script>
    import TipoSolicitacao from './tipos/tipos-solicitacao';
    import InformacoesUsuario from './informacoes-usuario';
    import AnexoUpload from './anexo-upload'
    import {VueEditor} from 'vue2-editor';
    export default {
        components: {
            TipoSolicitacao,
            InformacoesUsuario,
            AnexoUpload,
            VueEditor,
        },
        props: {
            user: {required: true}
        },

        data() {
            return {
                formRequerimento: {},
                checked: false,
                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                ],
                pageHeading: {
                    title: 'Novo Requerimento',
                    fa: 'fa fa-edit',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

        created(){
            this.formRequerimento = this.createForm();
        },

        methods: {
            createForm(requerimento) {
                return new Form({
                    id: requerimento ? requerimento.id : null,
                    nome_estudante: requerimento ? requerimento.nome_estudante : null,
                    tipos_solicitacao: [],
                    curso: requerimento ? requerimento.curso : null,
                    turno: requerimento ? requerimento.turno : null,
                    turma: requerimento ? requerimento.turma : null,
                    anexo_url: requerimento ? requerimento.anexo_url : null,
                    periodo: requerimento ? requerimento.periodo : null,
                    justificativa: requerimento ? requerimento.justificativa : '<p>Detalhamento do seu Pedido</p>',
                });
            },
            setEstudante(){
                this.checked = !this.checked;
                if (this.checked) {
                    this.formRequerimento.nome_estudante = this.user.name;
                } else {
                    this.formRequerimento.nome_estudante = null;
                }
            },

            save(){
                const uri = laroute.route('requerimento.store');
                Sg.post(uri, this.formRequerimento).then((response) => {
                    console.log('Requerimento criado', response.message);
                    swal('Pronto', response.message, 'success');
                    this.formRequerimento = this.createForm(requerimento);
                });
            },

        }
    }
</script>