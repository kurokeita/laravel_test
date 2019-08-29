@extends('master.master')
@section('title')
    Login
@endsection
@section('content')
<div class="container">
    {!! ($errors->first('id') != '') ? $errors->first('id')."<br>" : "" !!}
    {!! ($errors->first('name') != null)? $errors->first('name') : "" !!}
    <form method="POST">@csrf
        <div class="content">
            <label for="ID" class="ID">ID: </label>
            <input type="text" class="text" placeholder="ID" name='id' value="{{ old('id') }}"></input>
            <label for="Name">Name: </label>
            <input type="text" placeholder="Name" name='name' value="{{ old('name') }}"></input>
            <input type='submit'>
        </div>
    </form>
</div>
@endsection