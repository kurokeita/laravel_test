@extends('master.master')
@section('title')
    Test page
@endsection
@section('content')
    This is test page <br>
    {{ $id }}
    {{ $name }}
    {!! $test ?? '' !!}
@endsection