<!DOCTYPE html>
<html>
<style>
    body, html {
        height: 100%;
        margin: 0;
    }

    .bgimg {
        background-image: url('/public/re2.jpeg');
        height: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
        color: white;
        font-family: "Courier New", Courier, monospace;
        font-size: 25px;
    }

    .topleft {
        position: absolute;
        top: 0;
        left: 16px;
    }

    .bottomleft {
        position: absolute;
        bottom: 0;
        left: 16px;
    }

    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        color: black;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    a {
        position: absolute;
        top: 65%;
        left: 50%;
        color: black;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    a:link, a:visited {
        background-color: #f44336;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    a:hover, a:active {
        background-color: red;
    }

    hr {
        margin: auto;
        width: 80%;
    }
</style>
<body>

<div class="bgimg">

    <div class="middle">
        <h1>WELCOME TO LANDING</h1>
        <hr>

    </div>

</div>
<div>
<a href="{{ route('web.login.show') }}"  >Get Start</a>
</div>
</body>
</html>
