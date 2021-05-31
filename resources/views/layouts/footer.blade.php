@php 
$articles = App\Article::where('featured' , true)->orderBy('order')->take(6)->get();
$footerCats = App\Category::where('featured' , true)->take(5)->get();
$footerRcents = App\Post::where('recent' , true)->orderBy('order')->get();
$footerMosts = App\Post::where('most' , true)->orderBy('order')->take(3)->get();


@endphp


<footer>
    <div class="container">
        <div class="widgets">
        <div class="widget">
            <div class="widget__header">
            <h3>الاكثر مشاهدة</h3>
            </div>
            <div class="widget__content">
            <ul class="footer__posts">
                @foreach($footerMosts as $footerMost)
                <li>
                    <a href="{{route('post' , $footerMost->slug)}}">
                        <span class="date">{{$footerMost->created_at}}</span>
                        <h3>{{$footerMost->title}}</h3>
                    </a>
                </li>
                @endforeach
            </ul>
            </div>
        </div>
        <div class="widget">
            <div class="widget__header">
            <h3>اخر التحديثات</h3>
            </div>
            <div class="widget__content">
            <div class="footer__recently">
                @foreach($footerRcents as $footerRecent)
                    <div class="post-thumb">
                        <a href="{{route('post' , $footerRecent->slug)}}">
                            <img src="{{loadImage($footerRecent->image)}}">
                        </a>
                    </div>
                @endforeach
            </div>

            </div>
        </div>
        <div class="widget">
            <div class="widget__header">
                <h3>الاقسام</h3>
            </div>
            <div class="widget__content">
                <ul class="categories">
                    @foreach($footerCats as $footerCat)
                        <li>
                            <a href="{{ route('posts', ['category'=>$footerCat->slug]) }}">{{$footerCat->name}}</a>
                            <span>{{count($footerCat->posts)}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        </div>
        <div class="details">
        <div class="logo">
            
        </div>
        <div class="icons">
            <ul>
                <li><a
                    target="_blank"
                    href="{{App\StaticHtml::where('key' , 'facebook')->first()->value}}"
                    ><i class="fab fa-facebook-f"></i></a></li>
                <li><a
                    target="_blank"
                    href="{{App\StaticHtml::where('key' , 'twitter')->first()->value}}"
                    ><i class="fab fa-twitter"></i></a></li>
                <li><a
                    target="_blank"
                    href="{{App\StaticHtml::where('key' , 'linkedin')->first()->value}}"
                    ><i class="fab fa-linkedin-in"></i></a></li>
                <li><a
                    target="_blank"
                    href="{{App\StaticHtml::where('key' , 'youtube')->first()->value}}"
                    ><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
        </div>
        <div class="copyrights">

        <div class="links">
            <ul class="links__list">
            <li><a href="/about">عن المؤسسة</a></li>
            <li><a href="/articles">المقالات</a></li>
            <li><a href="contact">اتصل بنا</a></li>
            </ul>
        </div>
        <div class="copyrights__text">© جميع الحقوق محفوظة الي شركة <a
            href="http://esolve-eg.com"
            target="_blank"
            >ESOLVE</a>
        </div>
        </div>
    </div>
</footer>