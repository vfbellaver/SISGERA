<template>
    <li class="dropdown notification-menu">
        <a class="dropdown-toggle count-info" href="#" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope fa-lg"></i> <span class="label label-danger pull-right" v-if="notificacoes.length >0">{{this.notificacoes.length}}</span>
        </a>
        <ul class="dropdown-menu notificationlist">
            <div class="notifications">
                <li class="not-head">Existem {{this.notificacoes.length}} novos requerimentos.</li>
                <li v-for="notificacao in notificacoes" class="media">
                    <span class="media-left media-icon">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </span>
                    <div class="media-body">
                        <span class="block">Novo Requerimento de {{notificacao.usuario.name}} </span>
                        <a class="btn btn-sm btn-primary" @click="receberRequerimento(notificacao)"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i> Receber</a>
                    </div>
                </li>
            </div>
        </ul>
    </li>
</template>
<style lang="scss" scoped="scoped">
    .count-info .label {
        line-height: 12px;
        padding: 2px 5px;
        position: absolute;
        right: 6px;
        top: 8px;
    }
    .notifications{
        overflow: auto;
        max-height: 300px;
        min-width: 400px;
    }
    .media {
        padding: 5px;
    }
</style>
<script>
    export default {
            data(){
                return {
                    notificacoes: [],
                }
            },
            mounted(){
                this.novasNotificacoes();
                EventBus.$on('novaNotificacao', (e) => {
                    console.log("Nova notificacao",e);
                    this.notificacoes = e;
                });
            },
            methods: {
                novasNotificacoes(){
                    Sg.get(laroute.route('get-noticacoes'))
                        .then((response) => {
                            this.notificacoes = response;
                        });
                },
                receberRequerimento(requerimento){
                    const uri = laroute.route('requerimento-recebido',{requerimento:requerimento.id});
                    Sg.put(uri,new Form({})).then((response) => {
                        console.log('Requerimento Recebido', response.message);
                        this.removeRequerimento(requerimento);
                    });
                },
                removeRequerimento(requerimento) {
                    this.notificacoes.splice(this.findIndex(requerimento), 1);
                }
                ,

                findIndex(requerimento) {
                    return this.notificacoes.findIndex((_requerimento) => {
                        return _requerimento.id === requerimento.id;
                    });
                }
            }
    }
</script>