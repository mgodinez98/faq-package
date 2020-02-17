@extends('FaqPackage::master')
@section('content')
    <div class="container">
        <h2>Recursos</h2>
        <form action="{{ route('resources.store') }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="file-field input-field">
                <div class="btn green">
                    <span>Elige un archivo</span>
                    <input type="file" id="resource" name="resource">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($resources as $resource)
                <div class="col s12 m4">
                    <div class="card small">
                        <div class="card-image">
                            <img id="resource-{{ $resource->id }}" src="{{ storage_url('resources/'.$resource->name) }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $resource->name }}</span>
                        </div>
                        <div class="card-action">
                            <a onclick="copyToClipboard('{{ $resource->id }}')">Copiar al portapapeles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @section('body-scripts')
        @parent
        @include('FaqPackage::components.toasts')
        <script>
            document.getElementById('resource').onchange = function(){
                document.getElementById('form').submit();
            };
        </script>
        <script>
            async function copyToClipboard(id) {
                if(!navigator.clipboard){
                    M.toast({html: 'El navegador no soporta el copy to clipboard', classes:'red'});
                    return
                }
                const text = document.getElementById('resource-'+id).src
                try {
                    await navigator.clipboard.writeText(text)
                    M.toast({html: 'Link de imagen copiado al portapapeles', classes:'green'});
                } catch (error) {
                    M.toast({html: 'Ocurrió un error', classes:'red'});
                }
            }
        </script>
    @endsection
@endsection