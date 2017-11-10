<template>
    <div>
        <div class="col-md-2 row">
            <div class="side-nav">
                <nav>
                    <ul>
                        <li>
                            <a href="#" class="active">
                                <span><i class="fa fa-user"></i></span>
                                <span>Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a :href="novoRequerimento">
                                <span><i class="fa fa-user"></i></span>
                                <span>Novo Requerimento</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                novoRequerimento: laroute.route('requerimento.create')
            }
        }
    }
</script>