<html>
<head>
    <title>Game - Question&Answer</title>
    <?php
        wp_head();
    ?>
</head>
<body>
<div class="container">

    <h1>The Game</h1>
    <div class="question">

        <h2>The Question:</h2>
        {{ Form::open() }}

        <p>{{ Form::text('question') }}</p>
        <p>{{ Form::submit('submit', 'Ask your question') }}</p>

        {{ Form::close() }}
    </div>

    @if(isset($question))
        <div class="answer">
            <h2>The Answer:</h2>
                <p>Question: {{{ $question }}}</p>
                <p>Answer: {{ $answer }}</p>
        </div>
    @endif

</div>
<?php
    wp_footer();
?>
</body>
</html>