@extends('layout')
@section('content')
<div class="container">
<article class="article-recent">
                    <div class="article-recent-main">
                        <h2 class="article-title">{{$blog['title']}}</h2>
                        <p class="article-body">{{$blog['description']}}</p>
                        <div>
                            <form action="/blog/{{$blog['id']}}/delete" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="" class="btn btn-success">edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </article>
</div>
@endsection