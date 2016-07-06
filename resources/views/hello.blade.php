<html>
<head>
    @wp_head
</head>
<body>
    <h1>{{ __('Hello', THEME_TEXTDOMAIN) }}</h1>
    @foreach($articles as $article)
        <h2>{{ $article->post_title }}</h2>
    @endforeach

    @foreach($users as $user)
        <h3>{{ $user->first_name }}</h3>
    @endforeach

    @wp_footer
</body>
</html>