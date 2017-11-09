<template>
    <section class="content-header">
        <h2>
            {{data.title}}
        </h2>
        <ol class="breadcrumb">
            <li v-for="item in data.breadcrumb">
                <a :href="item.url">{{item.title}}</a>
            </li>
            <li class="active">
                <strong>{{data.title}}</strong>
            </li>
        </ol>
    </section>
</template>
<script>
    export default {
        props: {
            data: {required: true}
        }
    }
</script>