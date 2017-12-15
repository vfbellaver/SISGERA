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
                                        <input class="form-control" v-model="form.name" id="name" type="text"
                                               name="name"
                                               placeholder="Nome">
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
                                               placeholder="Rg" v-model="form.rg" v-rg>
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
                                               placeholder="Cpf" v-model="form.cpf" v-cpf>
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="6">
                                    <form-group :form="form" field="telefone">
                                        <label class="control-label" for="telefone"><h4>
                                            <strong>Telefone Fixo:</strong></h4></label>
                                        <input class="form-control" id="telefone" type="text" name="telefone"
                                               placeholder="Telefone fixo" v-model="form.telefone" v-tel>
                                    </form-group>
                                </column>
                                <column size="6">
                                    <form-group :form="form" field="celular">
                                        <label class="control-label" for="celular"><h4>
                                            <strong>Celular:</strong></h4></label>
                                        <input class="form-control" id="celular" type="text" name="celular"
                                               placeholder="Celular" v-model="form.celular" v-tel >
                                    </form-group>
                                </column>
                            </row>


                            <row>
                                <column size="6">
                                    <form-group :form="form" field="role">
                                        <label class="control-label" for="role"><h4>
                                            <strong>Tipo de Usuario:</strong></h4></label>
                                        <select class="form-control option" id="role" v-model="form.role">
                                            <option selected="selected" :value="form.role" >{{form.role}}</option>
                                            <option v-for="rl in roles" :value="rl">{{rl}}</option>
                                        </select>
                                    </form-group>
                                </column>
                                <column size="6" v-if="form.role !='aluno' && form.role !='externo' && form.role != this.tipouser">
                                    <form-group :form="form" field="role">
                                        <label class="control-label" for="role"><h4>
                                            <strong>Função:</strong></h4></label>
                                        <select class="form-control option" id="conta" v-model="form.conta">
                                            <option selected="selected" :value="form.conta">{{form.conta.name}}</option>
                                            <option v-for="ct in contas" :value="ct">{{ct.name}}</option>
                                        </select><br>
                                    </form-group>
                                </column>
                                <column size="6" v-else></column>
                            </row>
                            <row>
                                <column size="12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <a class="btn btn-default icon-btn" :href="index"><i
                                                    class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary icon-btn" type="submit" v-if="this.user"><i
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Atualizar
                                            </button>
                                            <button class="btn btn-primary icon-btn" type="submit" v-else><i
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Registrar
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
<style lang="scss" scoped="scoped">
    .option{
        font-size: 14px !important;
    }
</style>
<script>
    export default {
        props: {
            user: {required: false},
        },

        data(){
            return {
                roles: Sisgera.regras,
                contas:[],
                tipouser:'Selecione um tipo de usuário',
                form: null,
                index: laroute.route('home'),
            }
        },
        created(){
            this.load(this.user);
            this.getContas();
        },

        methods: {
            load(user){
                this.form = new Form({
                    id: user ? user.id : null,
                    name: user ? user.name : null,
                    role: user ? user.role.name : this.tipouser,
                    conta: user ? user.conta : {name:'Selecione um tipo de função'},
                    email: user ? user.email : null,
                    rg: user ? user.rg : null,
                    org_emissor: user ? user.org_emissor : null,
                    cpf: user ? user.cpf : null,
                    telefone: user ? user.telefone : null,
                    celular: user ? user.celular : null,
                });
            },

            save(){
                if (!this.form.id) {
                    const uri = laroute.route('user.store');
                    Sg.post(uri, this.form).then((response) => {
                        console.log('User Created', response.message);
                        swal('Pronto', response.message, 'success');
                        this.load(response.data);
                    });
                }
                else {
                    const uri = laroute.route('user.update',{user: this.form.id});
                    Sg.put(uri, this.form).then((response) => {
                        console.log('User Updated', response.message);
                        swal('Pronto', response.message, 'success');
                       this.form = response.data;
                    });
                }
            },
            getContas(){
                Sg.get(laroute.route('lista-todas'))
                    .then((response) => {
                        this.contas = response;
                    });
            },
        }
    }

</script>