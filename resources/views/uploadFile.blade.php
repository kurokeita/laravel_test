@extends('master.master')
@section('title')
    Upload File
@endsection
@section('content')
    <form method='POST' enctype="multipart/form-data">@csrf
        <label for="upload">Upload </label>
        <input type="file" name='file'>        
        <input type="submit">
        {{ $errors->first('file') }}
    </form>
    @php
        echo base_path();
    @endphp
@endsection