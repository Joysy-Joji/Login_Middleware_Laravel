@extends('partials.layout')

@section('body')
    <body>

    @include('partials.flasher')
    <table style="text-align: center">
        <tr><td><h2 style="text-align: center; font-family: 'Bookman Old Style'; font-size: xx-large; color: black">Welcome {{ $name }}</h2></td></tr>
{{--        <tr>   <td><h1 style="color: #005cbf">Name : {{ Auth()->user()->name}}</h1></td></tr>--}}
        <tr><td><h1 style="color: #005cbf">Email : {{ Auth()->user()->email}}</h1></td></tr>
        <tr><td><a href="{{ URL::to('edituser',Auth()->user()->id) }}" class="a">EDIT</a></td></tr>
        <tr>
            <td><a  href="{{ URL::to('logout') }}" class="btn">LOGOUT</a></td>
        </tr>
    </table>
    <table  class="table table-white mt-5" border="1" style="alignment: right">
        <thead>
        <tr>

            <th scope="col">No</th>
            <th scope="col">Email</th>
            <th scope="col">Login Time</th>

            <th scope="col">Action</th>


        </tr>
        </thead>
        <tbody>
        @foreach($user_logins as $user_login)
            <tr>
                <th scope="row">{{ $user_logins->firstItem() + $loop->index}}</th>
                <td>{{ $user_login->email }}</td>
                <td>{{ $user_login->created_at }}</td>

                <td>
{{--                    <a href="" class="b">Edit</a>--}}
                    <a href=" " class="bt">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<div>

    {{ $user_logins->links() }}
</div>
    </body>
@endsection

@section('styles')
    <style>
        body{
            align-content: center;
        }
        .btn{
            background-color: darkred;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .a{
            background-color: blue;

            border-width: 7px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .b{
            background-color: green;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .bt{
            background-color: red;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
@endsection

