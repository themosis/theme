<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @head
</head>
<body>
    <div>
        @loop
            <h2>{{ Loop::title() }}</h2>
            {!! Loop::content() !!}
            {{ route('profile') }}
        @endloop
    </div>
    @footer
</body>
</html>