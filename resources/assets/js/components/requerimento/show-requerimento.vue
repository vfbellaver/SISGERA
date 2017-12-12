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
                        <show-user-requerimento :user="this.user"></show-user-requerimento>
                        <row>
                            <column size="12">
                                <label class="control-label">
                                    <h4><strong>Nome do Estudante:</strong>&nbsp {{formRequerimento.nome_estudante}}
                                    </h4>
                                </label>
                            </column>
                        </row>
                        <row>

                        </row>
                        <row>
                            <column size="4">
                                <label class="control-label">
                                    <h4><strong>Curso:</strong>&nbsp {{formRequerimento.curso}}</h4>
                                </label>
                            </column>
                            <column size="2">
                                <label class="control-label">
                                    <h4><strong>Turma:</strong>&nbsp {{formRequerimento.turma}}</h4>
                                </label>
                            </column>
                            <column size="2">
                                <label class="control-label">
                                    <h4><strong>Periodo:</strong>&nbsp {{formRequerimento.periodo}}</h4>
                                </label>
                            </column>
                            <column size="4">
                                <label class="control-label">
                                    <h4><strong>Turno:</strong>&nbsp {{formRequerimento.turno}}</h4>
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
                                            </div>
                                        </column>
                                    </row>
                                </form-group>
                            </column>
                        </row>
                        <div v-if="naofinalizado && contaDestino">
                            <form class="form-horizontal" v-model="formRequerimento" @submit.prevent="save">
                                <row>
                                    <column size="12" v-show="regraUsuarioLogado == 'coordenador'|| 'cerel'">
                                        <fieldset class="col-md-12">
                                            <legend class="row">4) Resposta Requerimento</legend>
                                        </fieldset>
                                        <row>
                                            <column size="12">
                                                <div class="justificativa">
                                                    <form-group :form="formRequerimento" field="resposta">
                                                        <vue-editor v-model="formRequerimento.resposta"
                                                                    :editorToolbar="customToolbar"
                                                                    placeholder="Justifique a sua decisão aqui."></vue-editor>
                                                    </form-group>
                                                </div>
                                            </column>
                                        </row>
                                    </column>
                                </row>
                                <br>
                                <row>
                                    <column size="12">
                                        <div class="card-footer">
                                            <column size="6">
                                                <form-group :form="formRequerimento" field="conta">
                                                    <label class="col-md-2 control-label" for="conta">Despachar</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control option" id="conta"
                                                                v-model="formRequerimento.conta">
                                                            <option selected="selected" :value="formRequerimento.conta">
                                                                {{formRequerimento.conta.name}}
                                                            </option>
                                                            <option v-for="ct in contas" :value="ct">{{ct.name}}
                                                            </option>
                                                        </select><br>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class="btn btn-success icon-btn"
                                                           @click="despacharRequerimento">
                                                            <i class="fa fa-fw fa-lg fa-send"></i>Encaminhar
                                                        </a>
                                                    </div>
                                                </form-group>
                                            </column>
                                            <column size="6">
                                                <div class="form-group pull-right">
                                                    <a class="btn btn-danger icon-btn" @click="indeferirRequerimento">
                                                        <i class="fa fa-fw fa-lg fa-thumbs-down"></i>Indeferir Requerimento
                                                    </a>
                                                    <button class="btn btn-primary icon-btn" type="submit"><i
                                                            class="fa fa-fw fa-lg fa-thumbs-up"></i>Deferir Requerimento
                                                    </button>
                                                </div>
                                            </column>
                                        </div>
                                    </column>
                                </row>
                            </form>
                        </div>
                        <div v-else>
                            <row>
                                <column size="12">
                                    <fieldset class="col-md-12">
                                        <legend class="row">4) Situação Requerimento: </legend>
                                    </fieldset>
                                    <column size="6">
                                        <h4><i class="fa fa-check"></i>&nbsp;{{formRequerimento.situacao}}</h4>
                                    </column>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <fieldset class="col-md-12">
                                        <legend class="row">5) Resposta Requerimento</legend>
                                    </fieldset>
                                    <row>
                                        <column size="12">
                                            <div class="justificativa" v-html="formRequerimento.resposta"
                                                 v-if="formRequerimento.resposta">
                                            </div>
                                            <div class="justificativa" v-else>
                                                <p>Requerimento em processo.</p>
                                            </div>
                                        </column>
                                    </row>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <a class="btn btn-success icon-btn" :href="pdfrequerimento">
                                                <i class="fa fa-fw fa-lg fa-print"></i>Imprimir Requerimento
                                            </a>
                                        </div>
                                    </div>
                                </column>
                            </row>
                        </div>
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

    .justificativa {
        text-align: justify;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 18px;
    }

    .option {
        font-size: 14px !important;
    }

</style>
<script>
    import TipoSolicitacao from './tipos/tipos-solicitacao';
    import ShowUserRequerimento from './show-user-requerimento'
    import {VueEditor} from 'vue2-editor';
    export default {
        components: {
            TipoSolicitacao,
            ShowUserRequerimento,
            VueEditor,
        },
        props: {

            id: {required: false},
        },

        data() {
            return {
                formRequerimento: {},
                contas: [],
                pdfrequerimento: null,
                user: null,
                regraUsuarioLogado: null,
                naofinalizado: null,
                contaDestino: null,
                deferido: 'Deferido',
                indeferido: 'Indeferido',
                deferidoparcialmente: 'Deferido Parcialmente',

                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    [{'script': 'sub'}, {'script': 'super'}],
                    [{'indent': '-1'}, {'indent': '+1'}],
                    [{'list': 'ordered'}, {'list': 'bullet'}],
                    [{'align': []}],
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

        mounted(){
            this.regraUsuarioLogado = Sisgera.user.role.name;
            this.getRequerimento();
            this.getContas();
            this.pdfrequerimento = laroute.route('imprime-requerimento',{requerimento: this.id});
        },

        methods: {
            getRequerimento(){
                const uri = laroute.route('requerimento.show', {requerimento: this.id});
                Sg.find(uri).then((requerimento) => {
                    this.loadForm(requerimento);
                });
            },

            loadForm(requerimento) {
                this.user = requerimento.usuario;

                this.naofinalizado = requerimento.situacao !== this.deferido &&
                requerimento.situacao !== this.indeferido &&
                requerimento.situacao !== this.deferidoparcialmente ? true : false;

                if (Sisgera.user.conta) {
                    this.contaDestino = requerimento.conta.id === Sisgera.user.conta.id ? true : false;
                } else {
                    this.contaDestino = false;
                }
                this.formRequerimento = new Form({
                    id: requerimento.id,
                    nome_estudante: requerimento.nome_estudante,
                    tipos_solicitacao: requerimento.solicitacoes,
                    curso: requerimento.curso,
                    turno: requerimento.turno,
                    turma: requerimento.turma,
                    periodo: requerimento.periodo,
                    conta: requerimento.conta,
                    usuario: requerimento.usuario,
                    justificativa: requerimento.justificativa,
                    situacao: requerimento.situacao,
                    resposta: requerimento.resposta ? requerimento.resposta : '',
                });
            },
            getContas(){
                Sg.get(laroute.route('lista-todas'))
                    .then((response) => {
                        this.contas = response;
                    });
            },

            save(){
                this.formRequerimento.situacao = 'Deferido';
                const uri = laroute.route('requerimento.update', {requerimento: this.id});
                Sg.put(uri, this.formRequerimento).then((response) => {
                    console.log('Requerimento atualizado', response.message);
                    this.formRequerimento = new Form(response.data);
                    swal('Pronto', response.message, 'success');
                });
            },

            indeferirRequerimento(){
                this.formRequerimento.situacao = 'Indeferido';
                const uri = laroute.route('requerimento.update', {requerimento: this.id});
                Sg.put(uri, this.formRequerimento).then((response) => {
                    console.log('Requerimento atualizado', response.message);
                    this.formRequerimento = new Form([response.data]);
                    swal('Pronto', response.message, 'success');

                });
            },
            despacharRequerimento(){
                const uri = laroute.route('despachar-requerimento', {requerimento: this.id});
                Sg.post(uri, this.formRequerimento).then((response) => {
                    console.log('Requerimento despachado', response);
                    debugger;
                    this.loadForm(response.data);
                    swal('Pronto', response.message, 'success');
                    EventBus.$emit('novaNotificacao', response.data);
                });
            },
        }
    }
</script>