<template>
    <div>
        <div class="card">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal" v-model="formConta" @submit.prevent="save">
                            <fieldset class="col-md-12">
                                <legend class="row" v-if="conta === null"><i class="fa fa-plus"></i> &nbsp; Nova Conta</legend>
                                <legend class="row" v-else><i class="fa fa-vcard-o"></i> &nbsp; Editar Conta</legend>
                            </fieldset>

                            <row>
                                <column size="12">
                                    <form-group :form="formConta" field="name">
                                        <label class="control-label" for="name"><h4>
                                            <strong>Nome conta:</strong></h4></label>
                                        <input class="form-control" v-model="formConta.name" id="name" type="text"
                                               name="name"
                                               placeholder="Nome conta">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <form-group :form="formConta" field="funcao">
                                        <label class="control-label" for="funcao"><h4>
                                            <strong>Função:</strong></h4></label>
                                        <input class="form-control" id="funcao" type="text" name="funcao"
                                               placeholder="Funcao" v-model="formConta.funcao">
                                    </form-group>
                                </column>
                            </row>
                            <br>
                            <row>
                                <column size="12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <a class="btn btn-default icon-btn" :href="index"><i
                                                    class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary icon-btn" type="submit" v-if="conta === null"><i
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Criar Conta
                                            </button>
                                            <button class="btn btn-primary icon-btn" type="submit" v-else><i
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Atualizar Conta
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
            conta: {required: false},
        },

        data(){
            return {
                formConta: null,
                index: laroute.route('home'),
            }
        },
        created(){
            this.load(this.conta);
        },

        methods: {
            load(conta){
                this.formConta = new Form({
                    id: conta ? conta.id : null,
                    name: conta ? conta.name : null,
                    funcao: conta ? conta.funcao : null,
                });
            },

            save(){
                if (this.formConta.id === null) {
                    console.log('to aqui');
                    const uri = laroute.route('contas.store');
                    Sg.post(uri, this.formConta).then((response) => {
                        console.log('Conta Criada', response.message);
                        swal('Pronto', response.message, 'success');
                        this.formConta = response.data;
                    });
                } else {
                    console.log('to aqui 22');
                    const uri = laroute.route('contas.update',{conta: this.conta.id});
                    Sg.put(uri, this.formConta).then((response) => {
                        console.log('Conta Criada', response.message);
                        swal('Pronto', response.message, 'success');
                        this.formConta = response.data;
                    });
                }

            },
        }
    }

</script>