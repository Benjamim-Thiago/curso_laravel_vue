@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <panel-component title="Menu">
            Teste de conteúdo..

                <div class="row">
                    <div class="col-md-4">
                        <box-component></box-component>
                    </div>

                    <div class="col-md-4">
                        <panel-component title="Conteúdo 2" color="panel-red-dark">
                            Teste de conteúdo..
                        </painel>
                    </div>

                    <div class="col-md-4">
                        <panel-component title="Conteúdo 3" color="panel-primary">
                            Teste de conteúdo..
                        </painel>
                    </div>

                </div>
            </panel-component>
        </div>
    </div>
</div>
@endsection
