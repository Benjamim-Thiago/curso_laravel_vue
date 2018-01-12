<template>
    <div class="">
        <button v-if="!type || (type != 'button' && type != 'link')" type="button" v-bind:class="classcss || 'btn btn-primary'" data-toggle="modal" 
            v-bind:data-target="'#' + name">{{title}}</button>

        <button v-if="type=='button'" type="button" v-bind:class="classcss || 'btn btn-primary'" data-toggle="modal" 
            v-bind:data-target="'#'+ name">{{title}}</button>

        <a  href="#" v-if="type=='link'" v-bind:class="classcss || ''" data-toggle="modal" 
            v-bind:data-target="'#' + name" >{{title}}</a>
    </div>
</template>

<script>
    export default {
        props:['type', 'name', 'title', 'classcss']
    }
</script>
