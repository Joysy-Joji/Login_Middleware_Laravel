<html>
<head>
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
    </style>
</head>

<body>

@include('partials.flasher')
<table style="text-align: center">
    <tr><td><h2 style="text-align: center; font-family: 'Bookman Old Style'; font-size: xx-large; color: black">Welcome {{ $name }}</h2></td></tr>
     <tr>   <td><h1 style="color: #005cbf">Name : {{ Auth()->user()->name}}</h1></td></tr>
<tr><td><h1 style="color: #005cbf">Email : {{ Auth()->user()->email}}</h1></td></tr>
<tr><td><a href="{{ URL::to('edituser',Auth()->user()->id) }}" class="btn btn-primary">EDIT</a></td></tr>
<tr>
        <td><a  href="{{ URL::to('logout') }}" class="btn">LOGOUT</a></td>
    </tr>
</table>
</body>
</body>
</html>
