@extends('FaqPackage::master')
@section('title')
    FAQ - Artículos
@endsection
@section('head-styles')
    <style>
        body{
            background-color: #f3f5f7;
        }
    </style>
@endsection
@section('content')
    <div id="posts">
        <posts initial-query="{{ $query }}"
                algolia-id="{{ $algolia_id }}"
                algolia-search="{{ $algolia_search }}">
        </posts>
    </div>
@section('body-scripts')
{{--    <script src="{{ mix('js/app.js') }}"></script>--}}
    <script src="{{ mix('vendor/jaopmx/faq-package/public/js/app.js') }}"></script>
@endsection
@section('body-styles')
    @parent
@endsection
@endsection