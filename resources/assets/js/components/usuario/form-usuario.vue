<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal" v-model="form" @submit.prevent="save">
                            <fieldset class="col-md-12">
                                <legend class="row">Informacões do Usuario</legend>
                            </fieldset>

                            <row>
                                <column size="6">
                                    <label class="control-label" for="name"><h4>
                                        <strong>Nome:</strong></h4></label>
                                    <input class="form-control" id="name" type="text" name="name"
                                           placeholder="Nome Estudante" v-model="form.name">
                                </column>
                                <column size="6">
                                    <label class="control-label" for="email"><h4>
                                        <strong>Email:</strong></h4></label>
                                    <input class="form-control" id="email" type="email" name="email"
                                           placeholder="Email" v-model="form.email">
                                </column>
                            </row>
                            <row>
                                <column size="4">
                                    <label class="control-label" for="rg"><h4>
                                        <strong>Registro Geral:</strong></h4></label>
                                    <input class="form-control" id="rg" type="text" name="rg"
                                           placeholder="Rg" v-model="form.rg">
                                </column>
                                <column size="2">
                                    <label class="control-label" for="org_emissor"><h4>
                                        <strong>Orgão Emissor:</strong></h4></label>
                                    <input class="form-control" id="org_emissor" type="text" name="org_emissor"
                                           placeholder="Orgão Emissor" v-model="form.org_emissor">
                                </column>
                                <column size="6">
                                    <label class="control-label" for="cpf"><h4>
                                        <strong>Cpf:</strong></h4></label>
                                    <input class="form-control" id="cpf" type="text" name="cpf"
                                           placeholder="Cpf" v-model="form.cpf">
                                </column>
                            </row>
                            <row>
                                <column size="6">
                                    <label class="control-label" for="telefone"><h4>
                                        <strong>Telefone Fixo:</strong></h4></label>
                                    <input class="form-control" id="telefone" type="text" name="telefone"
                                           placeholder="Telefone fixo" v-model="form.telefone">
                                </column>
                                <column size="6">
                                    <label class="control-label" for="celular"><h4>
                                        <strong>Celular:</strong></h4></label>
                                    <input class="form-control" id="celular" type="text" name="celular"
                                           placeholder="Celular" v-model="form.celular">
                                </column>
                            </row>
                            <row>
                                <column size="6">
                                    <label class="control-label" for="password"><h4>
                                        <strong>Password:</strong></h4></label>
                                    <input class="form-control" id="password" type="password" name="password"
                                           placeholder="Digite um password" v-model="form.password">
                                </column>
                                <column size="6">
                                    <label class="control-label" for="confirm_password"><h4>
                                        <strong>Confirmacão Password:</strong></h4></label>
                                    <input class="form-control" id="confirm_password" type="password"
                                           name="confirm_password"
                                           placeholder="Confirme o password" v-model="form.confirm_password">
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <div class="card-footer">
                                        <a class="btn btn-default icon-btn" href="#"><i
                                                class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <button class="btn btn-primary icon-btn" type="button"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i>Register
                                        </button>
                                    </div>
                                </column>
                            </row>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

        data(){
            return {
                form: new Form(),
                pageHeading: {
                    title: 'Novo Usuario',
                    fa: 'fa fa-user-plus',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },
        methods: {
            save(){

            },
        }
    }

</script>