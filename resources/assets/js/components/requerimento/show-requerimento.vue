<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <row>
                <div class="col-xs-12">
                    <div class="bs-component">
                            <fieldset class="col-md-12">
                                <legend class="row">1) Dados Requerente
                                    <small class="pull-right">{{new Date | data('DD/M/Y') }} <i
                                            class="fa fa-calendar"></i></small>
                                </legend>
                            </fieldset>
                            <row>
                                <column size="4">
                                    <label class="control-label">
                                        <h4><strong>Nome do Requerente:</strong> &nbsp {{user.name}}</h4>
                                    </label>
                                </column>

                                <column size="4">
                                    <label class="control-label">
                                        <h4><strong>Rg:</strong> &nbsp {{user.rg}} &nbsp {{user.org_emissor}}</h4>
                                    </label>
                                </column>
                                <column size="4">
                                    <label class="control-label">
                                        <h4><strong>Cpf:</strong> &nbsp {{user.cpf}}</h4>
                                    </label>
                                </column>
                            </row>

                            <row>
                                <column size="4">
                                    <label class="control-label">
                                        <h4><strong>Email:</strong> &nbsp {{user.email}}</h4>
                                    </label>
                                </column>
                                <column size="4">
                                    <label class="control-label">
                                        <h4><strong>Tel Fixo:</strong>&nbsp {{user.telefone}} </h4>
                                    </label>
                                </column>
                                <column size="4">
                                    <label class="control-label">
                                        <h4><strong>Tel Celular:</strong>&nbsp {{user.celular}}</h4>
                                    </label>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <label class="control-label">
                                        <h4><strong>Nome do Estudante:</strong>&nbsp {{formRequerimento.nome_estudante}}</h4>
                                    </label>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <label class="control-label">
                                        <h4><strong>Curso:</strong>&nbsp {{formRequerimento.curso}}</h4>
                                    </label>
                                </column>
                            </row>
                            <row>
                                <column size="2">
                                    <label class="control-label">
                                        <h4><strong>Turno:</strong>&nbsp {{formRequerimento.turno}}</h4>
                                    </label>
                                </column>
                                <column size="2">
                                    <label class="control-label">
                                        <h4><strong>Periodo:</strong>&nbsp {{formRequerimento.periodo}}</h4>
                                    </label>
                                </column>
                                <column size="2">
                                    <label class="control-label">
                                        <h4><strong>Turma:</strong>&nbsp {{formRequerimento.turma}}</h4>
                                    </label>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                        <fieldset class="col-md-12">
                                            <legend class="row">2) Tipo de Solicitação:</legend>
                                        </fieldset>
                                    <div v-for="tp in formRequerimento.tipos_solicitacao">
                                        <column size="3">
                                            <h4><i class="fa fa-check"></i>&nbsp;{{tp.name}}</h4>
                                        </column>
                                    </div>
                                </column>
                            </row>

                            <row>
                                <column size="12">
                                    <form-group :form="formRequerimento" field="justificativa">
                                        <fieldset class="col-md-12">
                                            <legend class="row">3) Justificativa</legend>
                                        </fieldset>
                                        <row>
                                            <column size="12">
                                                <div class="justificativa" v-html="formRequerimento.justificativa">

                                                    <!--<vue-editor v-model="formRequerimento.justificativa" :disabled="true" :editorToolbar="customToolbar"></vue-editor>-->
                                                </div>
                                            </column>
                                        </row>
                                    </form-group>
                                </column>
                            </row>
                            <row v-show="regraUsuarioLogado.name === 'cerel' || regraUsuarioLogado.name === 'coordenador'">
                                <column size="12">
                                    <form-group :form="formRequerimento" field="justificativa">
                                        <fieldset class="col-md-12">
                                            <legend class="row">4) Resposta Requerimento</legend>
                                        </fieldset>
                                        <row>
                                            <column size="12">
                                                <div class="justificativa">
                                                    <vue-editor v-model="formRequerimento.justificativa" :disabled="true" :editorToolbar="customToolbar"></vue-editor>
                                                </div>
                                            </column>
                                        </row>
                                    </form-group>
                                </column>
                            </row>

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
    .justificativa{
        text-align: justify;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 18px;
    }
</style>
<script>
    import TipoSolicitacao from './tipos/tipos-solicitacao';
    import {VueEditor} from 'vue2-editor';
    export default {
        components: {
            TipoSolicitacao,
            VueEditor,
        },
        props: {

            id: {required: false},
        },

        data() {
            return {
                formRequerimento: {},
                user: null,
                regraUsuarioLogado: Sisgera.user.role.name,
                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [ 'code-block']
                ],
                pageHeading: {
                    title: 'Requerimento',
                    fa: 'fa fa-edit',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },

        created(){
            this.loadForm();
        },

        methods: {
            loadForm() {
                this.loaded = false;
                const uri = laroute.route('requerimento.show', {requerimento: this.id});
                Sg.find(uri).then((requerimento) => {
                    this.user = requerimento.usuario;
                    this.formRequerimento = new Form({
                        id: requerimento.id,
                        nome_estudante: requerimento.nome_estudante,
                        tipos_solicitacao: requerimento.solicitacoes,
                        curso: requerimento.curso,
                        turno: requerimento.turno,
                        turma: requerimento.turma,
                        periodo: requerimento.periodo,
                        justificativa: requerimento.justificativa,
                    });

                });
            },

            save(){
                const uri = laroute.route('requerimento.update');
                Sg.post(uri, this.formRequerimento).then((response) => {
                    console.log('Requerimento Deferido', response.message);
                    swal('Pronto', response.message, 'success');
                    this.formRequerimento = new Form();
                });
            },

        }
    }
</script>