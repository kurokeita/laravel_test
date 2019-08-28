{{-- @foreach ($arr as $id)
    @if ($id > 5)
        @continue
    @endif
    @continue ($id > 5)
    <p>ID {{ $id }}</p>
@endforeach --}}
@extends('master.master')
{{ Route::currentRouteName() }}
@section('content')
    @for ($i = 0; $i < count($arr); $i++) 
        @break($arr[$i]> 5)
        <p>ID {{ $arr[$i] }}</p>
    @endfor
@endsection
