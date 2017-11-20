<template>
    <div>
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
                                    <form-group :form="form" field="name">
                                        <label class="control-label" for="name"><h4>
                                            <strong>Nome:</strong></h4></label>
                                        <input class="form-control" v-model="form.name" id="name" type="text" name="name"
                                               placeholder="Nome Estudante" >
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="form" field="email">
                                        <label class="control-label" for="email"><h4>
                                            <strong>Email:</strong></h4></label>
                                        <input class="form-control" id="email" type="text" name="email"
                                               placeholder="Email" v-model="form.email">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="4">
                                    <form-group :form="form" field="rg">
                                        <label class="control-label" for="rg"><h4>
                                            <strong>Registro Geral:</strong></h4></label>
                                        <input class="form-control" id="rg" type="text" name="rg"
                                               placeholder="Rg" v-model="form.rg">
                                    </form-group>
                                </column>
                                <column size="2">
                                    <form-group :form="form" field="org_emissor">
                                        <label class="control-label" for="org_emissor"><h4>
                                            <strong>Orgão Emissor:</strong></h4></label>
                                        <input class="form-control" id="org_emissor" type="text" name="org_emissor"
                                               placeholder="Orgão Emissor" v-model="form.org_emissor">
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="form" field="cpf">
                                        <label class="control-label" for="cpf"><h4>
                                            <strong>Cpf:</strong></h4></label>
                                        <input class="form-control" id="cpf" type="text" name="cpf"
                                               placeholder="Cpf" v-model="form.cpf">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="6">
                                    <form-group :form="form" field="telefone">
                                        <label class="control-label" for="telefone"><h4>
                                            <strong>Telefone Fixo:</strong></h4></label>
                                        <input class="form-control" id="telefone" type="text" name="telefone"
                                               placeholder="Telefone fixo" v-model="form.telefone">
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="form" field="celular">
                                        <label class="control-label" for="celular"><h4>
                                            <strong>Celular:</strong></h4></label>
                                        <input class="form-control" id="celular" type="text" name="celular"
                                               placeholder="Celular" v-model="form.celular">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="6">
                                    <form-group :form="form" field="password">
                                        <label class="control-label" for="password"><h4>
                                            <strong>Password:</strong></h4></label>
                                        <input class="form-control" id="password" type="password" name="password"
                                               placeholder="Digite um password" v-model="form.password">
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="form" field="confirm_password">
                                        <label class="control-label" for="confirm_password"><h4>
                                            <strong>Confirmacão Password:</strong></h4></label>
                                        <input class="form-control" id="confirm_password" type="password"
                                               name="confirm_password"
                                               placeholder="Confirme o password" v-model="form.confirm_password">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="6">
                                    <form-group :form="form" field="role">
                                        <label class="control-label" for="role"><h4>
                                            <strong>Tipo de Usuario:</strong></h4></label>
                                       <select v-model="form.role" id="role" class="form-control">
                                           <option value="" selected>Selecione um tipo de Usuário</option>
                                           <option value="coordenador">Coordenador</option>
                                           <option value="cerel">Cerel</option>
                                           <option value="aluno">Aluno</option>
                                       </select>
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <a class="btn btn-default icon-btn" :href="index"><i
                                                    class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary icon-btn" type="submit"><i
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Register
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
          user:{required: false},
        },

        data(){
            return {
                form: null,
                index: laroute.route('home'),
            }
        },
        created(){
            this.load(this.user);
        },

        methods: {
            load(user){
                this.form = new Form({
                    id: user ? user.id : null,
                    name: user ? user.name : null,
                    email: user ? user.email :null,
                    rg: user ? user.rg : null,
                    org_emissor: user ? user.org_emissor : null,
                    cpf: user ? user.cpf : null,
                    telefone: user ? user.telefone : null,
                    celular: user ? user.celular : null,
                    role: user ? user.role : null,
                });
            },

            save(){
                Sg.post('user',this.form).then((response) => {
                    console.log('User Created',response.message);
                    swal('Pronto',response.message,'success')
                });
            },
        }
    }

</script>