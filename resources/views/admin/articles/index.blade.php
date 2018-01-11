@extends('layouts.app')

@section('content')
<page-component size="12">
    <slot>
        <panel-component title="Lista de Artigos" color="panel-orange-dark-1">
            <table-list-component 
                v-bind:titles="['#', 'Titulo', 'Descrição']"
                v-bind:items="[
                        [1, 'Laravel & Vue', 'Curso de Laravel & vue'],
                        [2, 'VueJS', 'Curso de vueJS'],
                        [3, 'Vue 2', 'Curso de vue 2'],
                        [4, 'React Native', 'Curso de React Native'],
                        [5, 'PHP OO', 'Curso de PHP Orientado a Objetos'],
                        [6, 'PHP MVC', 'Curso de PHP Padrão MVC'],
                        [7, 'Ruby on Rails', 'Curso de Ruby on Rails'],
                        [8, 'Angular & Node', 'Curso de Angular & Node'],
                        [9, 'Java', 'Curso de Java'],
                        [10, 'Bootstrap', 'Curso de Bootstrap']
                    ]"
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
@endsection
