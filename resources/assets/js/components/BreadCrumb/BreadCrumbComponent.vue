<template>
    <ol class="breadcrumb">
        <li v-for="item in listItems">
            <a v-bind:class="defineClass"
                v-if="item.url"
                v-bind:href="item.url">{{item.title}}</a>
            <span v-if="!item.url">{{item.title}}</span>
        </li>
    </ol>
</template>

<script>
    export default {
        props: ['list'],
        computed: {
            defineClass: function(){
                if(this.url){
                    return "active";
                }else{
                    return ""; 
                }
            },
            listItems: function(){
                return this.list;
            }
        }
    }
</script>
