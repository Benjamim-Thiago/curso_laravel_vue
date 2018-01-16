@extends('layouts.app')

@section('content')
<page-component size="12">
    <slot>
        <panel-component title="Lista de Artigos" color="panel-orange-dark-1">
            <bread-crumb-component v-bind:list="{{$listBreadCrumb}}"></bread-crumb-component>
            <table-list-component 
                v-bind:titles="['#', 'Titulo', 'Descrição']"
                v-bind:items="{{ $listArticles }}"
                create="#create" 
                detail="#detail" 
                edit="#edit" 
                deleted="#delete" 
                token="sfsfdsfsdf"
                order = "desc"
                orderColumn = 1
                modal="sim"
            >
        </table-list-component>
        </panel-component>
    </slot>
</page-component>
<modal-component modalname="add" title="Adicionar Artigo">
    <form-component 
        id="formAdd" 
        classcss=""
        action="#"
        method="put"
        enctype="multipart/form-data"
        token="1234567!@#$%&">

        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" id="title" name="title" 
                class="form-control" placeholder="Digite o Título">
        </div>

        <div class="form-group">
            <label for="description">Titulo</label>
            <input type="text" id="description" name="description" 
                class="form-control" placeholder="Digite a Descrição">
        </div>
    </form-component>
    <span slot="buttons">
        <button form="formAdd" type="submit" class="btn btn-success">Adicionar</button>
    </span>
</modal-component>

<modal-component modalname="edit" title="Editar Artigo">
    <form-component
        id="formEdit" 
        classcss=""
        action="#"
        method="put"
        enctype="multipart/form-data"
        token="1234567!@#$%&">

        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" id="title" name="title" 
                class="form-control" placeholder="Digite o Título" v-model="$store.state.item.title">
        </div>

        <div class="form-group">
            <label for="description">Titulo</label>
            <input type="text" id="description" name="description" 
                class="form-control" placeholder="Digite a Descrição" v-model="$store.state.item.description">
        </div>
    </form-component>
    <span slot="buttons">
        <button form="formEdit" type="submit" class="btn btn-primary">Atualizar</button>
    </span>
</modal-component>

<modal-component modalname="detail" v-bind:title="$store.state.item.title">
        <p>@{{$store.state.item.description}}</p>
</modal-component>
@endsection
