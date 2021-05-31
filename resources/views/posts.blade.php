@extends('layouts.app')

@section('content')
@include('layouts.breadcrumbs' , ['name' => 'الموضوعات'])
<div class="articles-page">
    <div class="container">
        <div class="articles__wrapper">
            <div class="articles">
                <div class="grid-articles-sec">
                @foreach($posts as $normalPost)
                    @include('partials.post' , ['normalPost' => $normalPost])
                @endforeach
                </div>
                @if ($posts->hasPages())
                    {{ $posts->appends(request()->input())->links() }}
                @endif
                
                <div class="ad">
                    <a href="{{$ad->link}}"><img src="{{$ad->value}}" alt=""></a>
                </div>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
</div>

@endsection
@push('css')
<style>
    .articles .post{
        grid-template-columns: 1fr !important
    }

    .articles .post-img{
        max-width: 100% !important
    }
</style>

@endpush