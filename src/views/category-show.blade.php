@extends('FaqPackage::master')
@section('title')
    FAQ - Categoría
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
            <div class="col s12">
                <div class="card-panel">
                    <h3 class="black-text" style="margin: 1.168rem 0;">
                        {{ $category->name }}
                    </h3>
                    <span class="grey-text text-darken-2">
					{{ $category->description }}
				</span><br>
                    <span class="grey-text text-darken-2">
					{{ $category->active_posts }} artículos en esta colección
				</span>
                    @if ($category->active_posts == 0)
                        <table class="highlight white" style="margin-top:1.168rem">
                            <tbody>
                            <tr>
                                <td class="center-align">
                                    <h3>No hay artículos para esta categoría</h3>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @else
                        <table class="highlight white" style="margin-top:1.168rem">
                            <tbody>
                            @foreach ($category->posts as $post)
                                <tr>
                                    <td>
                                        <a id="{{ 'show-post-'.$post->id }}" href="{{ route('posts.show', ['slug' => $post->slug]) }}">
                                            <ul>
                                                <li>
                                                    <p class="post-title">{{ $post->title }}</p>
                                                </li>
                                                <li>
                                                    <div class="chip">
                                                        {{ $post->author->full_name }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom-styles')
    @parent
    <style>
        .post-title {
            color: #00abc6;
            font-size: 1.3rem;
            margin-block-start: 0em;
        }
        td {
            padding: 15px;
        }
        tr {
            -webkit-transition: background-color .25s ease;
            transition: background-color .25s ease;
        }
    </style>
@endsection