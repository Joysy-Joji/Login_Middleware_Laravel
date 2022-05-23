@extends('partials.layout')

@section('body')
    <form action="{{ route('web.edituser')  }}"  method="POST">

        @csrf

        <div id="main">
            <table id="registrationTable">
                <tr>
                    <td>
                        <h2>Edit Profile</h2>

                        @include('partials.flasher')
                    </td>
                </tr>
                <tr>

                    <td><input type="text" placeholder="Name" value="{{ Auth()->user()->name }}"  name="name" id="nameleader" required="required"></td>
                </tr>



                <tr>
                    <td colspan="3" align="center">
                        <button id="bt">SUBMIT</button>
                    </td>
                </tr>



            </table>

        </div>
    </form>
@endsection

@section('styles')
    <style>
        body{
            margin:0;
            padding:0;
            outline:none;
            font:12px Arial;
            font-weight:bold;
            font-family: 'Comfortaa', cursive;

            background-color: white;
            user-select:none;
        }
        #main{
            width:500px;
            margin:auto;
            border:1px solid black;
            margin-top:100px;
            font-family: 'Comfortaa', cursive;
            position:relative;
            border-radius:4px;
            box-shadow: 0 0 3px black;
        }
        table{
            margin:auto;
            font-family: 'Comfortaa', cursive;
        }
        td{
            padding:10px;
            font-family: 'Comfortaa', cursive;
        }
        input[type="text"], input[type="password"], input[type="file"], input[type="date"], input[type="email"], input[type="radio"] {
            padding:10px;
            border-radius:3px;
            border:none;
            border:1px solid black;
            width:405px;
            outline:none;
            font-family: 'Comfortaa', cursive;
        }
        button{
            padding:10px;
            border:none;
            border-radius:4px;
            background:#069;
            color:#fff;
            outline:none;
            float:right;
            cursor:pointer;
            font-family: 'Comfortaa', cursive;
            margin-left:15px;
        }
        h2{
            font-size: 35px;
            font-family: 'Comfortaa', cursive;
            color:black;
        }
        registrationTable{
            alignment: center;
        }
        #info{
            padding:10px;
            border-radius:3px;
            position:absolute;
            top:310px;
            left:27px;
            color:#069;
            display:none;
            font-size:11px;
        }
        #btnRegister{
            background:#2ecc71;
        }
        /*
        #btnLogin{
          background:#34495e;
        }
        #loginTable{
          display:none;
        }
        */
    </style>
@endsection


