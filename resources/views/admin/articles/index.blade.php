@extends('layouts.app')

@section('content')
<page-component size="12">
    <slot>
        <panel-component title="Lista de Artigos" color="panel-orange-dark-1">
            <table-list-component 
                v-bind:titles="['#', 'Titulo', 'Descrição']"
                v-bind:items="[
                        [1,'Laravel & Vue', 'Curso de Laravel & vue'],
                        [2,'VueJS', 'Curso de vueJS'],
                    ]"
            >
        </table-list-component>
        </panel-component>
    </slot>
</page-component>
@endsection
