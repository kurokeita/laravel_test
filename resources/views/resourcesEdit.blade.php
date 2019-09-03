@extends('master.master')
@section('title')
    Edit
@endsection
@section('content')
<div class="container">
    {{-- {!! ($errors->first('firstName') != '') ? $errors->first('firstName')."<br>" : "" !!}
    {!! ($errors->first('name') != null)? $errors->first('name') : "" !!} --}}
    {!! $errors->first('firstName') ?? '' !!}
    <form method="POST" action="test/resources/{{ $user->id }}">
        @csrf
        @method('PUT')
        <div class="content">
            <label for="firstName">First Name: </label>
            <input type="text" placeholder="First Name" name='firstName' value="{{ $user->firstName }}"></input>
            <label for="lastName">Last Name: </label>
            <input type="text" placeholder="Last Name" name='lastName' value="{{ $user->lastName }}"></input>
            <label for="dob">DOB: </label>
            <input type="date" name="dob" value="{{ $user->dob }}"></input>
            <input type='submit'>
        </div>
    </form>
</div>
@endsection