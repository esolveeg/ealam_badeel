@php 
$ad  = App\Ad::where('key' , 'sidebar')->first();
$articles = App\Article::where('featured' , true)->orderBy('order')->take(6)->get();
$categories = App\Category::all();
$sidbarRcents = App\Post::where('recent' , true)->orderBy('order')->take(6)->get();
$sidbarMosts = App\Post::where('most' , true)->orderBy('order')->take(6)->get();
$auhtorId = App\Author::where('slug' , 'أحمد-حمدي')->first()->id;
$mainArticle=  App\Article::where('author_id' , $auhtorId)->orderBy('created_at', 'desc')->first();

@endphp

<div class="sidebar" id="sidebar">
    <div class="banner">
        <a href="http://savumoney.co"><img src="{{asset('storage/ad2.jpg')}}" alt=""></a>
    </div>
    <div class="ceo">
        <figure class="sidebar-author-img">
            <img src="{{$mainArticle->author->image}}" alt="">
        </figure>
        <div class="sidebar-author">
            <div class="sidebar-author-data">
                    <h3><a href="{{ route('articles', ['author'=>$mainArticle->author->slug]) }}">بقلم : <strong>أحمد حمدي</strong></a></h3>
                    <span><a href="{{route('article' , $mainArticle->slug)}}">{{$mainArticle->title}}</a></span>
            </div>
        </div>
    </div>

</div>