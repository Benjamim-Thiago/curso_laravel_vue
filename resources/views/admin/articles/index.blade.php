@extends('layouts.app')

@section('content')
<page-component size="12">
    <slot>
        <panel-component title="Lista de Artigos" color="panel-orange-dark-1">
            <bread-crumb-component v-bind:list="{{$listBreadCrumb}}"></bread-crumb-component>
            <modal-link-component
                type="button"
                name="myModalTest"
                title="Novo"
                classcss=""
            >
            </modal-link-component>
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
            >
        </table-list-component>
        </panel-component>
    </slot>
</page-component>
<modal-component
    modalname="myModalTest"
    modalclass="modal-dialog modal-lg">
    <panel-component title="Adicionar Artigos">
        <form-component 
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
            <button type="submit" class="btn btn-success">Adicionar</button>
        </form-component>
    </panel-component>
</modal-component>
@endsection
