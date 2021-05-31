<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Article;
use App\Author;
use App\Category;
use App\Post;
use App\Video;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function mainPage()
    {
        $mainPost = Post::where('main', true)->first();
        $recents = Post::where('recent', true)->orderBy('order')->take(4)->get();
        $tops = Post::where('top', true)->orderBy('order')->take(3)->get();
        $trending = Post::where('trending', true)->orderBy('order')->take(6)->get();
        $featured = Post::where('featured', true)->orderBy('order')->take(9)->get();
        $mosts = Post::where('most', true)->orderBy('order')->take(4)->get();
        $mainVideo = Video::where('main', true)->first();
        $videos = Video::where('submain', true)->take(4)->get();
        $ad = Ad::where('key', 'top_home')->first();
        $articles = Article::take(6)->get();

        //dd($tops);
        // dd($mainPost);
        return view('main', compact(['ad', 'articles', 'mainPost', 'videos', 'mainVideo', 'recents', 'tops', 'trending', 'featured', 'mosts']));
    }

    public function author($slug)
    {
        return view('author');
    }
    public function post($slug)
    {
        $path = [
            [
                'name' => 'موضوعات',
                'link' => 'posts',
            ],
        ];
        $post = Post::where('slug', $slug)->first();
        $related = Post::where('category_id', $post->category->id)->take(4)->get();
        return view('post', compact('path', 'post', 'related'));
    }
    public function posts(Request $request)
    {
        $ad = Ad::where('key', 'post')->first();
        $category = isset($request->category) ? Category::where('slug', $request->category)->first()->id : '';
        $posts = $category === "" ? Post::orderBy('order') : Post::orderBy('order')->where('category_id', $category);
        isset($request->type)
        ? $request->type == 'recent'
        ? $posts->where('recent', true)
        : $posts->where('top', true)
        : '';
        $recents = Post::where('recent', true)->orderBy('order')->take(4)->get();

        $posts = $posts->paginate(6);

        return view('posts', compact(['ad', 'posts']));
    }
    public function article($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $related = Article::where('category_id', $article->category->id)->take(4)->get();
        return view('article', compact(['article', 'related']));
    }
    public function video($id)
    {
        $video = Video::find($id);
        return view('video', compact(['video']));
    }
    public function articles(Request $request)
    {
        $ad = Ad::where('key', 'article')->first();
        $author = isset($request->author) ? Author::where('slug', $request->author)->first()->id : '';
        $articles = $author === '' ?
        Article::paginate(8) :
        Article::where('author_id', $author)->paginate(8);
        return view('articles', compact(['ad', 'articles']));
    }
    public function videos()
    {
        $videos = Video::all();
        return view('videos', compact(['videos']));
    }
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {

        return view('about');
    }
    public function authors()
    {
        return view('authors');
    }
}
