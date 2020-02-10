@extends('FaqPackage::master')
@section('head-styles')
<style>
    .collection-title{
        font-size: 2.28rem;
        line-height: 110%;
        margin: 1.52rem 0 .912rem 0;
    }
    .add-collection{
        vertical-align: bottom;
        margin-left: 1rem;
    }
</style>
@endsection
@section('content')
    @include('FaqPackage::components.navbar')
    
    <div class="container">
        <div class="row">
            <div class="col s6">
                <ul class="collection with-header">
                    <li class="collection-header"><span class="collection-title">Categorías</span><a id="add-collection" class="btn-floating btn-small green add-collection"><i class="fas fa-plus"></i></a></li>
                    @foreach ($categories as $category)
                        <li class="collection-item"><div>{{ $category->name }} - {{ $category->active_posts }}<a 
                            href="#editCategory"
                            id="edit-category-{{$category->id}}" 
                            class="secondary-content modal-trigger edit-category"
                            data-id="{{$category->id}}"
                            data-namecategory="{{$category->name}}"
                            data-descategory="{{$category->description}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col s4 offset-s2">
                <div id="new-category" class="card scale-transition scale-out">
                    <div class="card-panel">
                        <span class="card-title">Nueva categoría</span>
                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" type="text" class="validate" name="name" required>
                                    <label for="name">Nombre</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="description" type="text" class="validate" name="description" required>
                                    <label for="description">Descripción</label>
                                </div>
                                <div class="col s12 center-align">
                                    <button type="submit" class="btn waves-effect waves-light green">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('FaqPackage::components.edit-category')
@endsection
@section('body-scripts')
    @parent
    @include('FaqPackage::components.toasts')
    <script>
        $(function () {
            $('.edit-category').click(function() {
                $('#hidden-category-id').val(this.dataset.id);
                $('#category-name').val(this.dataset.namecategory);
                $('#category-description').val(this.dataset.descategory);
                $('#category-name').next().addClass("active");
                $('#category-description').next().addClass("active");
            });
        });
    </script>
    <script>
        $('.add-collection').click(function() {
            $('#new-category').removeClass('scale-out').addClass('scale-in');
        })
    </script>
@endsection