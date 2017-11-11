<template>
    <div class="page-title">
        <div class="div">
            <h1><i class="fa fa-laptop"></i> {{data.title}}</h1>
            <!--<p>Bootstrap Components</p>-->
        </div>
        <div class="div">
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li v-for="item in data.breadcrumb">
                    <a :href="item.url">{{item.title}}</a>
                </li>
                <li class="active">
                    <strong>{{data.title}}</strong>
                </li>
            </ul>
        </div>
    </div>

</template>
<script>
    export default {
        props: {
            data: {required: true}
        }
    }
</script>