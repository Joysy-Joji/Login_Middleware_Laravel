@extends('partials.layout')

@section('body')
    <body>

    @include('partials.flasher')
    <table style="text-align: center">
        <tr><td><h2 style="text-align: center; font-family: 'Bookman Old Style'; font-size: xx-large; color: black">Welcome {{ $name }}</h2></td></tr>
{{--        <tr>   <td><h1 style="color: #005cbf">Name : {{ Auth()->user()->name}}</h1></td></tr>--}}
        <tr><td><h1 style="color: #005cbf">Email : {{ Auth()->user()->email}}</h1></td></tr>
        <tr><td><a href="{{ URL::to('edituser',encrypt(Auth()->user()->id)) }}" class="a">EDIT</a></td></tr>
        <tr>
            <td><a  href="{{ URL::to('logout') }}" class="btn">LOGOUT</a></td>
        </tr>
    </table>
    <table  class="table table-white mt-5" border="1" id="logintable" style="alignment: right">
        <thead>
        <tr>

            <th scope="col">No</th>
            <th scope="col">Email</th>
            <th scope="col">Recent Login Time</th>

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
                    <a href=" {{ URL::to('delete_userlogins',$user_login->login_id) }}" class="bt" onclick=" return confirm('Do You Want To Delete')">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<div>

    {{ $user_logins->links() }}
</div>
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.js"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">




            $(document).ready(function() {
                $('#logintable').DataTable( {
                    processing:true,
                    info:true,

                    {{--ajax:"{{ route('web.dashboard') }}",--}}
                    

                });
            });


            $(function () {
                $ajaxSetup({

                })
            })


        </script>


    @endsection
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

