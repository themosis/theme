@extends('layouts.master')

@section('content')
    <h2>{{ $page->post_title }}</h2>
@stop

@section('sidebar')
    @parent
    <h3>Sample widget:</h3>
    <ul>
        <li>Article 1</li>
        <li>Article 2</li>
        <li>Article 3</li>
        <li>Article 4</li>
        <li>Article 5</li>
    </ul>
@stop