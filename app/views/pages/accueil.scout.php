@extends('layouts.master')

@section('content')

<h2>Main content: from the accueil scout view file.</h2>
<p>{{ $name }}</p>

<p>{{ Option::get('th-main-options', 'application-name') }}</p>
<p>{{ Option::get('th-general', 'facebook') }}</p>

@stop

@section('sidebar')
    @parent
    <ul>
        <li>First item</li>
        <li>Second item</li>
        <li>Third item</li>
    </ul>
@stop