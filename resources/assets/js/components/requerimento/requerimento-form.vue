<template>
    <div>
        <header-content v-if="pageHeading" :data="pageHeading"></header-content>
        <div class="card">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal">
                            <fieldset class="col-md-12">
                                <legend class="row">1) Dados Requerente
                                    <small class="pull-right"><i class="fa fa-calendar"></i> 01/01/2016</small>
                                </legend>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label"><h4>Nome do Requerente:</h4></label>
                                    Vagner Felipe Bellaver
                                </div>
                            </div>
                            <br>
                            <fieldset class="col-md-12">
                                <legend class="row">2) Tipo de Requerimento</legend>
                            </fieldset>
                            <div class="col-md-12">
                                <tipo-requerimento></tipo-requerimento>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import TipoRequerimento from './tipos-requerimentos';
    export default {
        components: {
          TipoRequerimento,
        },

        data() {
            return {
                pageHeading: {
                    title: 'Novo Requerimento',
                    fa: 'fa fa-edit',
                    breadcrumb: [
                        {title: 'Home', url: laroute.route('home')}
                    ]
                },
            }
        },
    }
</script>