@extends('layouts.main')

@section('content')
    @if(have_posts())
        @if(is_home() && ! is_front_page())
            <header>
                <h1 class="page-title screen-reader-text">{{ single_post_title('', false) }}</h1>
            </header>
        @endif
        @while(have_posts())
            @php(the_post())
            @template('parts.content', get_post_type())
        @endwhile
        {!! get_the_posts_navigation() !!}
    @else
        @template('parts.content', 'none')
    @endif
@endsection