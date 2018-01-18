@extends('layouts.app')

@section('content')
<page-component size="12">
    @if($errors->all())
      <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>
    @endif
    <slot>
        <panel-component title="Lista de Artigos" color="panel-orange-dark-1">
            <bread-crumb-component v-bind:list="{{$listBreadCrumb}}"></bread-crumb-component>
            <table-list-component 
                v-bind:titles="['#', 'Titulo', 'Descrição', 'Data']"
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
        action="{{ route('articles.store') }}"
        method="post"
        enctype=""
        token="{{ csrf_token() }}">

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title">Titulo</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Digite o Título">
            @if($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" class="form-control" placeholder="Digite a Descrição">
            @if($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
            <label for="date">Data</label>
            <input type="datetime-local" id="date" name="date" class="form-control">
            @if($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
            <label for="content">Teor</label>
            <textarea name="content" id="content" class="form-control"></textarea>
            @if($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
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
