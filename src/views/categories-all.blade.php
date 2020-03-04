@extends('FaqPackage::master')
@section('title')
    FAQ - Inicio
@endsection
@section('head-styles')
    <style>
        body{
            background-color: #f3f5f7;
        }
    </style>
@endsection
@section('content')
{{--    @include('components.search-bar')--}}
    <div class="container" style="width: 60%;">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col s12">
                    <a id="{{ 'show-category-'.$category->id  }}" href="{{ route('categories.show', $category->slug) }}">
                        <div class="card card-button">
                            <div class="card-content">
						<span class="card-title black-text">
							{{ $category->name }}
						</span>
                                <p class="black-text">
                                    {{ $category->description }}
                                </p>
                                <span class="grey-text">
							{{ $category->active_posts }} artículos en esta colección
						</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('bottom-styles')
    @parent
    <style>
        input[type=search]:not(.browser-default):focus:not([readonly]){
            border-bottom: 1px solid #00abc6;
            -webkit-box-shadow: 0 1px 0 0 #00abc6;
            box-shadow: 0 1px 0 0 #00abc6;
        }
        .card-button:hover{
            -webkit-box-shadow: 0 3px 3px 0 rgba(0,0,0,0.14), 0 1px 7px 0 rgba(0,0,0,0.12), 0 3px 1px -1px rgba(0,0,0,0.2);
            box-shadow: 0 3px 3px 0 rgba(0,0,0,0.14), 0 1px 7px 0 rgba(0,0,0,0.12), 0 3px 1px -1px rgba(0,0,0,0.2);
        }
    </style>
@endsection