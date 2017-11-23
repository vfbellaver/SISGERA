<template>
    <div>
        <div class="card">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal" v-model="formPassword" @submit.prevent="updatePassword">
                            <fieldset class="col-md-12">
                                <legend class="row"><i class="fa fa-lock"></i>&nbsp; Informacões de Segurança</legend>
                            </fieldset>

                            <row>
                                <column size="12">
                                    <form-group :form="formPassword" field="current_password">
                                        <label class="control-label" for="current_password"><h4>
                                            <strong>Senha atual:</strong></h4></label>
                                        <input class="form-control" v-model="formPassword.current_password"
                                               id="current_password" type="text"
                                               name="current_password">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <form-group :form="formPassword" field="new_password">
                                        <label class="control-label" for="new_password"><h4>
                                            <strong>Nova senha:</strong></h4></label>
                                        <input class="form-control" id="new_password" type="text" name="new_password"
                                               v-model="formPassword.new_password">
                                    </form-group>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <form-group :form="formPassword" field="confirm_password">
                                        <label class="control-label" for="confirm_password"><h4>
                                            <strong>Confirmação de senha:</strong></h4></label>
                                        <input class="form-control" id="confirm_password" type="text"
                                               name="confirm_password"
                                               v-model="formPassword.confirm_password">
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
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Atualizar senha
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
                formPassword: null,
                index: laroute.route('home'),
            }
        },
        created(){
            this.load(this.user);
        },

        methods: {
            load(){
                this.formPassword = new Form({
                    id: this.user.id,
                    current_password: '',
                    new_password: '',
                    confirm_password: '',
                });
            },

            updatePassword(){
                const uri = laroute.route('user.update', {user: this.formPassword.id});
                Sg.put(uri, this.formPassword).then((response) => {
                    console.log('User Updated', response.message);
                    swal('Pronto', response.message, 'success');
                    this.formPassword = null;
                });
            },
        }
    }

</script>