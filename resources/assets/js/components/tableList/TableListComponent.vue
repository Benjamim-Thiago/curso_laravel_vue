<template>
    <div>
        <a href="" class="btn btn-primary">Criar</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="title in titles">{{title}}</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items">
                    <td  v-for="i in item">{{i}}</td>
                    <td>
                        <a href="" class="btn btn-warning">Editar</a>
                        <a href="" class="btn btn-danger">Editar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles', 'items']
    }
</script>
