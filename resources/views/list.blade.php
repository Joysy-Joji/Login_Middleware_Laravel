<h1>hi</h1>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>EMAIL</td>

    </tr>
   @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>

        </tr>
    @endforeach
</table>
