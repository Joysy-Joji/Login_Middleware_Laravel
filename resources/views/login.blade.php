
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="sample1.css">



</head>

<body>
<form action="{{ route('web.login')  }}" method="POST">

    @csrf

    <div id="main">

        <table id="registrationTable">
{{--            @include('partials.flasher')--}}

            <tr>
                <td>
                    <h2>Have An Account? </h2>

{{--                    @include('partials.flasher')--}}
                </td>
            </tr>

            <tr>

                <td><input type="email" placeholder="email"  name="email" id="emailid"  ></td>


            </tr>


            <tr>
                <td><input type="password"   placeholder="password" name="password" id="passwordid"  ></td>

            </tr>




<tr>
    <td>


        <input type="checkbox" name="remember" checked>
        <span class="checkmark"></span>
        <label style="color: black; font-size: medium">Remember Me</label>
    </td>
</tr>
 <tr>
    <td>

                    <button id="bt">LOGIN</button>
                </td>
            </tr>
            <td> <a href="{{URL::to('/register')}}" style="color: black; background: deepskyblue; text-align: center; font-size: medium; font-family: 'Bookman Old Style' " >Register for login</a></td>




        </table>

    </div>
</form>




</body>

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
        box-shadow: 0 0 3px #eee;
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
        color:black
    ;
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

</html>
