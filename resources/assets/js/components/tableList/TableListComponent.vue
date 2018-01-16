<template>
    <div>
        <div class="form-inline">
            <a v-if="create && !modal" v-bind:href="create" class="btn btn-primary">Novo</a>
            <modal-link-component v-if="create && modal" type="button" modalname="add" title="Novo" classcss="">
            </modal-link-component>
            
            <div class="form-inline pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="search">
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="orderByColumn(index)" v-for="(title,index) in titles">{{title}}</th>                    
                    <th v-if="edit || detail || deleted">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in list">
                    <td v-for="i in item">{{i}}</td>

                    <td v-if="edit || detail || deleted">
                        <form v-bind:id="index" v-if="deleted && token" v-bind:action="deleted" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" v-bind:value="token">
                            
                            <a v-if="edit && !modal" v-bind:href="edit" class="btn btn-warning">Editar</a>
                            <modal-link-component v-if="edit && modal" v-bind:item="item" type="button" modalname="edit" title="Editar" classcss="btn btn-warning">
                            </modal-link-component>
                            
                            <a v-if="detail && !modal" v-bind:href="detail"  class="btn btn-info">Detalhe</a>
                            <modal-link-component v-if="detail && modal" v-bind:item="item" type="button" modalname="detail" title="Detalhe" classcss="btn btn-info">
                            </modal-link-component>

                            <a href="#" v-on:click="executeForm(index)" class="btn btn-danger">Remover</a>
                        </form>
                        <span v-if="!token">
                            <a v-if="edit && !modal" v-bind:href="edit" class="btn btn-warning">Editar</a>
                            <modal-link-component v-if="edit && modal" type="button" modalname="edit" title="Editar" classcss="btn btn-warning">
                            </modal-link-component>

                            <a v-if="detail" v-bind:href="detail" class="btn btn-info">Detalhe</a>
                            <a v-if="deleted" v-bind:href="deleted" class="btn btn-danger">Remover</a>
                        </span>

                        <span v-if="token && !deleted">
                            <a v-if="edit && !modal" v-bind:href="edit" class="btn btn-warning">Editar</a>
                            <modal-link-component v-if="edit && modal" type="button" modalname="edit" title="Editar" classcss="btn btn-warning">
                            </modal-link-component>
                            
                            <a v-if="detail" v-bind:href="detail" class="btn btn-info">Detalhe</a>
                        </span>   
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:[
            'titles',
            'items',
            'create',
            'detail', 
            'edit', 
            'deleted', 
            'token',
            'order',
            'orderColumn',
            'modal'
        ],
        data: function(){
            return {
                search: '',
                orderAux: this.order || 'asc',
                orderAuxColumn: this.orderColumn || 0
            }
        },
        methods: {
            executeForm: function(index){
                document.getElementById(index).submit()
            },
            orderByColumn: function(column){
                this.orderAuxColumn = column;
                if(this.orderAux.toLowerCase()=="asc"){
                    this.orderAux = "desc";
                } else{
                    this.orderAux = "asc";
                }
            }
        },
        computed: {
            list: function(){
                let order = this.orderAux;
                let orderColumn = this.orderAuxColumn;
                order = order.toLowerCase();
                orderColumn = parseInt(orderColumn);

                if(order=="asc"){
                    this.items.sort(function(a, b){
                        if(Object.values(a)[orderColumn] > Object.values(b)[orderColumn]){ return 1;}
                        if(Object.values(a)[orderColumn] < Object.values(b)[orderColumn]){ return -1;}

                        return 0;
                    });
                }else{
                    this.items.sort(function(a, b){
                        if(Object.values(a)[orderColumn] < Object.values(b)[orderColumn]){ return 1;}
                        if(Object.values(a)[orderColumn] > Object.values(b)[orderColumn]){ return -1;}

                        return 0;
                    });
                }

                //verifica se foi existe busca
                if(this.search){
                    return this.items.filter(res=>{
                        res = Object.values(res);
                        //X=começar deum pois não ha interesse em pesquisar pelo Id
                        for(var x=1; x < res.length; x++){
                            if(res[x].toString().toLowerCase().indexOf(this.search.toLowerCase()) >= 0){
                                return true;
                            }
                        }
                        return false;
                    })
                }

                //Retorna lista se não houver busca(lista completa)
                return this.items;
            }
        }
    }
</script>
