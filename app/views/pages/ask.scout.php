@extends('layouts.master')

@section('content')

<h2>Ask your question:</h2>
{{ Form::open() }}
    {{ Form::text('question') }}
    {{ Form::submit('ask', 'Ask') }}
{{ Form::close() }}

@stop