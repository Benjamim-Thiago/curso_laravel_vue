@extends('layouts.app')

@section('content')
<page-component size="12">
    <slot>
        <panel-component title="Lista de Artigos" color="panel-orange-dark-1">
            <a href="" class="btn btn-primary">Criar</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Autor</th>
                        <th>Data</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Teste</td>
                        <td>Teste Descricao</td>
                        <td>Benjamim</td>
                        <td>29/10/2017</td>
                        <td>
                            <a href="" class="btn btn-warning">Editar</a>
                            <a href="" class="btn btn-danger">Editar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </panel-component>
    </slot>
</page-component>
@endsection
