<template>
    <div>
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <ul class="sidebar-menu">
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
            </section>
        </aside>
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