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
        <panel-component title="Lista de Usuários" color="panel-orange-dark-1">
            <bread-crumb-component v-bind:list="{{$listBreadCrumb}}"></bread-crumb-component>
            <table-list-component 
                v-bind:titles="['#', 'Name', 'E-mail']"
                v-bind:items="{{ json_encode($listing) }}"
                create="#create" 
                detail="/admin/users/" 
                edit="/admin/users/" 
                deleted="/admin/users/" 
                token="{{ csrf_token() }}"
                order = "desc"
                orderColumn = 1
                modal="sim"
                urlsearch=""
            >
        </table-list-component>
        <div align="center">
            {{ $listing->links() }}
        </div>
        </panel-component>
    </slot>
</page-component>
<modal-component modalname="add" title="Adicionar Artigo">
    <form-component 
        id="formAdd" 
        classcss=""
        action="{{ route('users.store') }}"
        method="post"
        enctype=""
        token="{{ csrf_token() }}">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Digite o Nome Completo" value="{{old('name')}}">
            @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Digite o E-mail"  value="{{old('email')}}">
            @if($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Digite a senha">
            @if($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

    </form-component>
    <span slot="buttons">
        <button form="formAdd" type="submit" class="btn btn-success">Cadastrar</button>
    </span>
</modal-component>

<modal-component modalname="edit" title="Editar Usuário">
    <form-component
        id="formEdit" 
        classcss=""
        v-bind:action="'/admin/users/' + $store.state.item.id"
        method="put"
        enctype=""
        token="{{ csrf_token() }}">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Titulo</label>
            <input type="text" id="name" name="name" 
                class="form-control" placeholder="Digite o Nome" v-model="$store.state.item.name">
            @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Descrição</label>
            <input type="email" id="email" name="email" 
                class="form-control" placeholder="Digite o Email" v-model="$store.state.item.email">
            @if($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" class="form-control">
            @if($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </form-component>
    <span slot="buttons">
        <button form="formEdit" type="submit" class="btn btn-primary">Atualizar</button>
    </span>
</modal-component>

<modal-component modalname="detail" v-bind:title="$store.state.item.name">
        <p>@{{$store.state.item.email}}</p>
</modal-component>
@endsection
