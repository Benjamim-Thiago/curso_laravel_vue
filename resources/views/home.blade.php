@extends('layouts.app')

@section('content')
<page-component>
    <slot>
        <panel-component title="Menu">
            <div class="row">
                <div class="col-md-4">
                    <box-component qtd="80" title="Artigos" url="#" color="orange" icon="ion ion-pie-graph"></box-component>
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
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
        </div>
    </div>
</div>
@endsection
