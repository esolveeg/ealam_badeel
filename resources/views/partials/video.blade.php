<div class="video">
        <figure class="post-img mw100 mh100">
            <a href="video/{{$video->id}}" title="{{$video->seo}}">
                 <img src="{{loadImage($video->image)}}" alt="{{$video->seo}}">
                <div class="video-play"></div>
            </a>
        </figure>
        <div class="items-center">
            <div class="post-title">
                <h6><a href="video/{{$video->id}}" title="{{$video->seo}}">{{$video->name}}</a></h6>
            </div>
            <div class="post-meta">
                <ul class="post-meta__list">
                    {{-- @if($video->author->name)
                    <li>
                        <span>بواسطة</span>
                        <a href="/">
                            <span class="author">{{$video->author->name}}</span>
                        </a>
                    </li>
                    @endif --}}
                </ul>
            </div>
        </div>
    </div>
    