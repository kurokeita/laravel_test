@extends('master.master')
@section('title')
    View Database
@endsection
@section('content')
    <table class='table'>
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>password</th>
            <th>created_at</th>
            <th>updated_at</th>
        <tr>
    @foreach ($db as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->pass }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
        <tr>
    @endforeach
    </table>
    <div class="float-right">{{ $db->onEachSide(2)->links() }}</div>    
@endsection