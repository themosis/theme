@extends('layouts.main')

@section('content')
    @loop
        @include('parts.content')
    @endloop
@endsection