@extends('layouts.main')

@section('content')
    @loop
        @template('parts.content', get_post_type())

        {!! get_the_post_navigation() !!}

        @if(comments_open() || get_comments_number())
            @php(comments_template('/views/comments/template.php'))
        @endif
    @endloop
@endsection