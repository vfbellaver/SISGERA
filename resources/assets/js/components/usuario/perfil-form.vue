<template>
    <div>
        <div class="card">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal" v-model="formPerfil" @submit.prevent="updatePerfil">
                            <fieldset class="col-md-12">
                                <legend class="row"><i class="fa fa-user"></i> &nbsp; Informacões do Usuario</legend>
                            </fieldset>

                            <row>
                                <column size="6">
                                    <form-group :form="formPerfil" field="name">
                                        <label class="control-label" for="name"><h4>
                                            <strong>Nome:</strong></h4></label>
                                        <input class="form-control" v-model="formPerfil.name" id="name" type="text"
                                               name="name"
                                               placeholder="Nome Estudante">
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="formPerfil" field="email">
                                        <label class="control-label" for="email"><h4>
                                            <strong>Email:</strong></h4></label>
                                        <input class="form-control" id="email" type="text" name="email"
                                               placeholder="Email" v-model="formPerfil.email">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="4">
                                    <form-group :form="formPerfil" field="rg">
                                        <label class="control-label" for="rg"><h4>
                                            <strong>Registro Geral:</strong></h4></label>
                                        <input class="form-control" id="rg" type="text" name="rg"
                                               placeholder="Rg" v-model="formPerfil.rg">
                                    </form-group>
                                </column>
                                <column size="2">
                                    <form-group :form="formPerfil" field="org_emissor">
                                        <label class="control-label" for="org_emissor"><h4>
                                            <strong>Orgão Emissor:</strong></h4></label>
                                        <input class="form-control" id="org_emissor" type="text" name="org_emissor"
                                               placeholder="Orgão Emissor" v-model="formPerfil.org_emissor">
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="formPerfil" field="cpf">
                                        <label class="control-label" for="cpf"><h4>
                                            <strong>Cpf:</strong></h4></label>
                                        <input class="form-control" id="cpf" type="text" name="cpf"
                                               placeholder="Cpf" v-model="formPerfil.cpf">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="6">
                                    <form-group :form="formPerfil" field="telefone">
                                        <label class="control-label" for="telefone"><h4>
                                            <strong>Telefone Fixo:</strong></h4></label>
                                        <input class="form-control" id="telefone" type="text" name="telefone"
                                               placeholder="Telefone fixo" v-model="formPerfil.telefone">
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="formPerfil" field="celular">
                                        <label class="control-label" for="celular"><h4>
                                            <strong>Celular:</strong></h4></label>
                                        <input class="form-control" id="celular" type="text" name="celular"
                                               placeholder="Celular" v-model="formPerfil.celular">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <a class="btn btn-default icon-btn" :href="index"><i
                                                    class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary icon-btn" type="submit"><i
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Atualizar Perfil
                                            </button>
                                        </div>
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
        props: {
            user: {required: false},
        },

        data(){
            return {
                formPerfil: null,
                index: laroute.route('home'),
            }
        },
        created(){
            this.load(this.user);
        },

        methods: {
            load(user){
                this.formPerfil = new Form({
                    id: user ? user.id : null,
                    name: user ? user.name : null,
                    email: user ? user.email : null,
                    rg: user ? user.rg : null,
                    org_emissor: user ? user.org_emissor : null,
                    cpf: user ? user.cpf : null,
                    telefone: user ? user.telefone : null,
                    celular: user ? user.celular : null,
                });
            },

            updatePerfil(){
                const uri = laroute.route('user.update', {user: this.formPerfil.id});
                Sg.put(uri, this.formPerfil).then((response) => {
                    console.log('User Updated', response.message);
                    swal('Pronto', response.message, 'success');
                    this.formPerfil = response.data;
                });
            },
        }
    }

</script>