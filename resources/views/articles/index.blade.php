@foreach ($articles as $article)
    <h3>{{ $article->title }} <small>{{ $article->created_at->diffForHumans() }}</small></h3>

    {{--@foreach ($topic->posts as $post)--}}
        {{--<p>{{ $post->body }} - {{ $post->user->name }}</p>--}}
    {{--@endforeach--}}
@endforeach
