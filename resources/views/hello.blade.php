<html>
<head>
    @wp_head
</head>
<body>
    <h1>{{ __('Hello', THEME_TEXTDOMAIN) }}</h1>
    @foreach($articles as $article)
        <h2>{{ $article->post_title }}</h2>
        <a href="{{ Loop::link($article->ID) }}">More</a>
    @endforeach

    @foreach($users as $user)
        <h3>{{ $user->first_name }}</h3>
    @endforeach

    {!! Form::select('options', [
        'Posts' => [
            34 => 'First post',
            45 => 'Second post',
            124 => 'Third post'
        ],
        'Projects' => [
            15 => 'First project',
            38 => 'Second project',
            254 => 'Third project'
        ]
    ]) !!}

    {!! Form::select('options', [
        'Posts' => [
            '34' => 'First post',
            '45' => 'Second post',
            '124' => 'Third post'
        ],
        'Projects' => [
            '15' => 'First project',
            '38' => 'Second project',
            '254' => 'Third project'
        ]
    ]) !!}

    {!! Form::select('options', [
        'Posts' => [
            'key25' => 'First post',
            'key45' => 'Second post',
            'key124' => 'Third post'
        ],
        'Projects' => [
            'key15' => 'First project',
            'key38' => 'Second project',
            'key254' => 'Third project'
        ]
    ]) !!}

    {!! Form::select('options', [
        'Posts' => [
            'First post',
            'Second post',
            'Third post'
        ],
        'Projects' => [
            'First project',
            'Second project',
            'Third project'
        ]
    ]) !!}

    @wp_footer
</body>
</html>