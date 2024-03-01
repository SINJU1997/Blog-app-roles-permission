@extends('layout')
@section('content')
<div class="container container-flex">
            <main role="main">
                
                <article class="article-featured">
                    <img src="img/life.jpg" alt="simple white desk on a white wall with a plant on the far right side" class="article-image">
                </article>
                @foreach ($blogs as $blog)
                <article class="article-recent">
                    <div class="article-recent-main">
                        <h2 class="article-title">{{$blog['title']}}</h2>
                        <p class="article-body">{{$blog['description']}}</p>
                        <a href="/blog/{{$blog['id']}}" class="article-read-more">CONTINUE READING</a>
                    </div>
                    <div class="article-recent-secondary">
                        <img src="img/food.jpg" alt="two dumplings on a wood plate with chopsticks" class="article-image">
                        <p class="article-info">{{$blog['posted_at']}}</p>
                    </div>
                </article>
                @endforeach
            </main>
            
            <aside class="sidebar">
                
                <div class="sidebar-widget">
                    <h2 class="widget-title">ABOUT ME</h2>
                    <img src="img/about-me.jpg" alt="john doe" class="widget-image">
                    <p class="widget-body">I find life better, and I'm happier, when things are nice and simple.</p>
                </div>
                   
            </aside>
            
        </div>
        
@endsection