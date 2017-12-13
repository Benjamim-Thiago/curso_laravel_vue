<template>
    <div v-bind:class="defineColor">
        <div class="panel-heading">{{title}}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'color'],
        computed: {
            defineColor: function(){
                return "panel " + (this.color || "panel-default");
            }
        }
    }

</script>

<style media="screen">
    .panel-red-dark{
        border-color: #ca1e1e;
    }
    .panel-red-dark > .panel-heading {
        color: #f5f7f9;
        background-color: #ca1e1e;
        border-color: #ca1e1e;
    }

      .panel-green-dark-1{
        border-color: #0e8413;
    }
    .panel-green-dark-1 > .panel-heading {
        color: #f5f7f9;
        background-color: #0e8413;
        border-color: #0e8413;
    }
</style>
