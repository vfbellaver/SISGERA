<template>
    <div>
        <div class="row">
            <div class="col-md-3" v-for="tipo in tpRequerimentos">
                <div class="animated-checkbox">
                    <label>
                        <input type="checkbox"><span class="label-text">{{tipo.name}}</span>
                    </label>
                </div>
            </div>

        </div>

    </div>
</template>
<script>

    export default {
            data() {
            return {
                tpRequerimentos: [],
            }
        },

        mounted(){
          this.load();
        },

        methods: {
            load(){
                Sg.get(laroute.route('tipos-requerimento'))
                    .then((response) => {
                        this.tpRequerimentos = response;
                    });
            }
        }
    }
</script>