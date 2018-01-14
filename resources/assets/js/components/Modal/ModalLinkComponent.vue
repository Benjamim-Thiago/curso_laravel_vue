<template>
    <span>
        <button v-if="!type || (type != 'button' && type != 'link')" type="button" v-bind:class="classcss || 'btn btn-primary'" data-toggle="modal" 
            v-bind:data-target="'#' + modalname">{{title}}</button>

        <button v-if="type=='button'" type="button" v-bind:class="classcss || 'btn btn-primary'" data-toggle="modal" 
            v-bind:data-target="'#'+ modalname">{{title}}</button>

        <a  href="#" v-if="type=='link'" v-bind:class="classcss || ''" data-toggle="modal" 
            v-bind:data-target="'#' + modalname" >{{title}}</a>
    </span>
</template>

<script>
    export default {
        props:['type', 'modalname', 'title', 'classcss']
    }
</script>
