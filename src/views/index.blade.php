@extends('FaqPackage::master')
@section('content')
    @include('FaqPackage::components.navbar')
    <div class="container">
        <h2>Posts</h2>
        <div class="row">
            <div class="card">
                <table class="striped highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Fecha de creación</th>
                        <th>Título del post</th>
                        <th>Categoría</th>
                        <th>Plataforma</th>
                        <th>Autor</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    @if(count($posts)>0)
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->created_at}} </td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->categories()->first()->name}}</td>
                                <td>{{$post->platform == 2 ? 'hireline.io' : 'empleosti.com.mx'}}</td>
                                <td>{{$post->author->full_name}}</td>
                                <td>
                                    <a href="{{ route('posts.edit', ['post_id' => $post->id]) }}"
                                       role="button"
                                       data-toggle="tooltip"
                                       title="Editar Post"
                                       class="btn-floating btn-small orange"><i class="fas fa-edit"></i></a>
                                    @if($post->active)
                                        <a href="{{ route('posts.toggle', ['post_id' => $post->id]) }}"
                                            role="button"
                                            data-toggle="tooltip"
                                            title="Desactivar Post"
                                            id="deactivate-post-{{ $post->id }}"
                                            class="btn-floating btn-small red"><i class="far fa-eye-slash"></i>
                                        </a>    
                                    @else
                                        <a href="{{ route('posts.toggle', ['post_id' => $post->id]) }}"
                                            role="button"
                                            data-toggle="tooltip"
                                            title="Activar Post"
                                            id="activate-post-{{ $post->id }}"
                                            class="btn-floating btn-small green"><i class="far fa-eye"></i>
                                        </a>    
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td></td>
                            <td colspan="8">
                                <div class="row-fluid"><h2>No se encontraron resultados</h2>
                                </div>
                            </td>
                        </tr>
                    @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    @section('body-scripts')
        @parent
        @include('FaqPackage::components.toasts')
    @endsection
@endsection