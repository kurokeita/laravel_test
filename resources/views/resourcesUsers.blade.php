@extends('master.master')
@section('title')
    Users list
@endsection
@section('content')
    <script>
        $(document).ready(function() {
            var sort = '{{ $sort }}';
            $('#sort').val(sort);
            $('#sort').change(function() {
                var val = $('#sort').val();
                var arr = val.split(' ');
                var sortby = arr[0];
                var orderby = arr[1];
                window.location = 'test/resources?sortby=' + sortby + '&orderby=' + orderby;
                console.log('sortby=' + sortby + '&orderby=' + orderby);
            })
        })
    </script>
    <a href='test/resources/create' class='btn btn-success'>Create new user</a>
    <select name="sort" id="sort">
        <option value='id asc'>ID ASC</option>
        <option value='id desc'>ID DESC</option>
        <option value='firstName asc'>First Name ASC</option>
        <option value='firstName desc'>First Name DESC</option>
        <option value='lastName asc'>Last Name ASC</option>
        <option value='lastName desc'>Last Name DESC</option>
        <option value='dob asc'>DOB ASC</option>
        <option value='dob desc'>DOB DESC</option>
    </select>
    <table class='table table-striped table-dark table-hover'>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th colspan=3>Action</th>
        </tr>
        @foreach($users as $_user)
            <tr>
                <td>{{ $_user->id }}</td>
                <td>{{ $_user->firstName }}</td>
                <td>{{ $_user->lastName }}</td>
                <td>{{ $_user->dob }}</td>
                <td>{{ $_user->created_at }}</td>
                <td>{{ $_user->updated_at }}</td>
                <td>
                    <a href='test/resources/{{ $_user->id }}' class='btn btn-info'>Show</a>
                </td>
                <td>
                    <a href='test/resources/{{ $_user->id }}/edit' class='btn btn-success'>Edit</a>
                </td>
                <td>
                    <form method='POST' action='test/resources/{{ $_user->id }}'>
                        @csrf
                        @method('DELETE')
                        <input type='submit' class='btn btn-danger' value='Delete'>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="float-right">{{ $users->onEachSide(2)->links() }}</div>
@endsection