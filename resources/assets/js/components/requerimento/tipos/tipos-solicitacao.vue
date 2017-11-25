<template>
    <div>
        <div class="row">
            <div class="col-md-3" v-for="tipo in tpRequerimentos">
                <div class="animated-checkbox">
                    <label>
                        <input type="checkbox"><span class="label-text" @click="marquei(tipo)">{{tipo.name}}</span>
                    </label>
                </div>
            </div>

        </div>

    </div>
</template>
<script>

    export default {
        props: {
            value: {required: true},
        },

        data() {
            return {
                internalValue: null,
                tpRequerimentos: [],
            }
        },

        mounted(){
            this.load();
        },

        created() {
            this.internalValue = this.value;
        },

        methods: {
            load(){
                Sg.get(laroute.route('tipos-solicitacao'))
                    .then((response) => {
                        this.tpRequerimentos = response;
                    });
            },

            marquei(valor){
                this.internalValue.push(valor);
            },
        }
    }
</script>