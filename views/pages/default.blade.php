@extends('layouts.main')

@section('content')
    @loop
        @template('parts.content', 'page')

        @if(comments_open() || get_comments_number())
            @php(comments_template('/views/comments/template.php'))
        @endif
    @endloop
@endsection