@extends('layouts.app')

@section('content')
<page-component size="10">
    <slot>
        <panel-component title="Menu">
            <bread-crumb-component v-bind:list="{{$listBreadCrumb}}"></bread-crumb-component>
            <div class="row">
                <div class="col-md-4">
                    <box-component qtd="80" title="Artigos" url="{{route('articles.index')}}" color="orange" icon="ion ion-pie-graph"></box-component>
                </div>
                <div class="col-md-4">
                    <box-component qtd="1500" title="Usuários" url="#" color="blue" icon="ion ion-person-stalker"></box-component>
                </div>
                <div class="col-md-4">
                    <box-component qtd="3" title="Autores" url="#" color="red" icon="ion ion-person"></box-component>
                </div>
            </div>
        </panel-component>
    </slot>
</page-component>
@endsection
