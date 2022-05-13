
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
<form action="{{ route('web.register')  }}" method="POST">

    @csrf

    <div id="main">
        <table id="registrationTable">
            <tr>
                <td>
                    <h2>Registration </h2>

                    @if(!empty($error = session('error')))
                        <span style="color: red;">{{ $error }}</span>
                    @endif
                </td>
            </tr>
            <tr>

                <td><input type="text" placeholder="Name"  name="name" id="nameleader" required="required"></td>
            </tr>


            <tr>
                <td><input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" name="email" id="emailid" required></td>
            </tr>






            <tr>
                <td><input type="password" placeholder="Password" name="password"  pattern=".{5,}" title="Password must have Five or more characters" id="password" required></td>
            </tr>
            <tr>
                <td><input type="password" placeholder="Confirm Password"   onkeyup="cpass_check()" name="cpassword" id="cpassword" required></td>
                <td><h3 id="xx" style="color:red"></h3></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <button id="bt">REGISTER</button>
                </td>
            </tr>
            {{--            <tr>--}}
            {{--               --}}


            {{--                <td>--}}
            {{--                    --}}
            {{--                    <button id="Insbtn">Register</button>--}}


            {{--                </td>--}}

            {{--            </tr>--}}


        </table>

    </div>
</form>


<script>

    function cpass_check(){

        var passw=document.getElementById("password").value;
        var cpassw=document.getElementById("cpassword").value;
        if(passw!=cpassw){
            document.getElementById("xx").innerHTML="MISSMATCH"
            document.getElementById("bt").style.display = 'none';
        }
        else{
            document.getElementById("xx").style.display = 'none';
            document.getElementById("bt").style.display = 'block';
        }
    }
</script>

</body>

<style>
    body{
        margin:0;
        padding:0;
        outline:none;
        font:12px Arial;
        font-weight:bold;
        font-family: 'Comfortaa', cursive;

        background-color: black;
        user-select:none;
    }
    #main{
        width:500px;
        margin:auto;
        border:1px solid #eee;
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
        border:1px solid #eee;
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
        color:blue;
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
