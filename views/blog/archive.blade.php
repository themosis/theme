@extends('layouts.main')

@section('content')
    @if(have_posts())
        <header class="page-header">
            <h1 class="page-title">{!!  get_the_archive_title() !!}</h1>
            <div class="archive-description">{!! get_the_archive_description() !!}</div>
        </header>
        @while(have_posts())
            @php(the_post())
            @template('parts.content', get_post_type())
        @endwhile
        {!! get_the_posts_navigation() !!}
    @else
        @template('parts.content', 'none')
    @endif
@endsection