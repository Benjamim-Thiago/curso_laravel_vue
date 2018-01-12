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
<modal-component
    modalname="myModalTest"
    modalclass="modal-dialog modal-lg">
    <panel-component title="Adicionar Artigos">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
                <label>
                <input type="checkbox"> Check me out
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </panel-component>
</modal-component>
@endsection
