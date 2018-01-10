<template>
    <div>
        <a v-if="create" v-bind:href="create" class="btn btn-primary">Criar</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="title in titles">{{title}}</th>
                    <th v-if="edit || detail || deleted">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items">
                    <td  v-for="i in item">{{i}}</td>

                    <td v-if="edit || detail || deleted">
                        <form action="" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" v-bind:value="token">
                            
                            <a v-if="edit" v-bind:href="edit" class="btn btn-warning">Editar</a>
                            <a v-if="datail" v-bind:href="detail" class="btn btn-info">Detalhe</a>
                            <a v-if="deleted" v-bind:href="deleted" class="btn btn-danger">Excluir</a>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles', 'items', 'create', 'detail', 'edit', 'deleted', 'token']
    }
</script>
