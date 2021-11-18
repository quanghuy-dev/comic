<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Latest compiled and minified JS -->
    <script src="//code.jquery.com/jquery.js"></script>
    
    <style>
        @import url(https://fonts.googleapis.com/css?family=Dancing+Script|Roboto);

        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }

        body {
            background: #cc3367;
            text-align: center;
            font-family: 'Roboto', sans-serif;
        }

        .panda {
            position: relative;
            width: 200px;
            margin: 50px auto;
        }

        .face {
            width: 200px;
            height: 200px;
            background: #fff;
            border-radius: 100%;
            margin: 50px auto;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
            z-index: 50;
            position: relative;
        }

        .ear,
        .ear:after {
            position: absolute;
            width: 80px;
            height: 80px;
            background: #000;
            z-index: 5;
            border: 10px solid #fff;
            left: -15px;
            top: -15px;
            border-radius: 100%;
        }

        .ear:after {
            content: '';
            left: 125px;
        }

        .eye-shade {
            background: #000;
            width: 50px;
            height: 80px;
            margin: 10px;
            position: absolute;
            top: 35px;
            left: 25px;
            -webkit-transform: rotate(220deg);
            transform: rotate(220deg);
            border-radius: 25px/20px 30px 35px 40px;
        }

        .eye-shade.rgt {
            -webkit-transform: rotate(140deg);
            transform: rotate(140deg);
            left: 105px;
        }

        .eye-white {
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 100%;
            background: #fff;
            z-index: 500;
            left: 40px;
            top: 80px;
            overflow: hidden;
        }

        .eye-white.rgt {
            right: 40px;
            left: auto;
        }

        .eye-ball {
            position: absolute;
            width: 0px;
            height: 0px;
            left: 20px;
            top: 20px;
            max-width: 10px;
            max-height: 10px;
            -webkit-transition: 0.1s;
            transition: 0.1s;
        }

        .eye-ball:after {
            content: '';
            background: #000;
            position: absolute;
            border-radius: 100%;
            right: 0;
            bottom: 0px;
            width: 20px;
            height: 20px;
        }

        .nose {
            position: absolute;
            height: 20px;
            width: 35px;
            bottom: 40px;
            left: 0;
            right: 0;
            margin: auto;
            border-radius: 50px 20px/30px 15px;
            -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
            background: #000;
        }

        .body {
            background: #fff;
            position: absolute;
            top: 200px;
            left: -20px;
            border-radius: 100px 100px 100px 100px/126px 126px 96px 96px;
            width: 250px;
            height: 282px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        .hand,
        .hand:after,
        .hand:before {
            width: 40px;
            height: 30px;
            border-radius: 50px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
            background: #000;
            margin: 5px;
            position: absolute;
            top: 70px;
            left: -25px;
        }

        .hand:after,
        .hand:before {
            content: '';
            left: -5px;
            top: 11px;
        }

        .hand:before {
            top: 26px;
        }

        .hand.rgt,
        .rgt.hand:after,
        .rgt.hand:before {
            left: auto;
            right: -25px;
        }

        .hand.rgt:after,
        .hand.rgt:before {
            left: auto;
            right: -5px;
        }

        .foot {
            top: 360px;
            left: -80px;
            position: absolute;
            background: #000;
            z-index: 1400;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
            border-radius: 40px 40px 39px 40px/26px 26px 63px 63px;
            width: 82px;
            height: 120px;
        }

        .foot:after {
            content: '';
            width: 55px;
            height: 65px;
            background: #222;
            border-radius: 100%;
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            margin: auto;
        }

        .foot .finger,
        .foot .finger:after,
        .foot .finger:before {
            position: absolute;
            width: 25px;
            height: 35px;
            background: #222;
            border-radius: 100%;
            top: 10px;
            right: 5px;
        }

        .foot .finger:after,
        .foot .finger:before {
            content: '';
            right: 30px;
            width: 20px;
            top: 0;
        }

        .foot .finger:before {
            right: 55px;
            top: 5px;
        }

        .foot.rgt {
            left: auto;
            right: -80px;
        }

        .foot.rgt .finger,
        .foot.rgt .finger:after,
        .foot.rgt .finger:before {
            left: 5px;
            right: auto;
        }

        .foot.rgt .finger:after {
            left: 30px;
            right: auto;
        }

        .foot.rgt .finger:before {
            left: 55px;
            right: auto;
        }

        form {
            display: none;
            max-width: 400px;
            padding: 20px 40px;
            background: #fff;
            height: 300px;
            margin: auto;
            display: block;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
            -webkit-transition: 0.3s;
            transition: 0.3s;
            position: relative;
            -webkit-transform: translateY(-100px);
            transform: translateY(-100px);
            z-index: 500;
            border: 1px solid #eee;
        }

        form.up {
            -webkit-transform: translateY(-180px);
            transform: translateY(-180px);
        }

        h1 {
            color: #FF4081;
            font-family: 'Dancing Script', cursive;
        }

        .btn {
            background: #fff;
            padding: 5px;
            width: 150px;
            height: 35px;
            border: 1px solid #FF4081;
            margin-top: 25px;
            cursor: pointer;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            box-shadow: 0 50px #FF4081 inset;
            color: #fff;
        }

        .btn:hover {
            box-shadow: 0 0 #FF4081 inset;
            color: #FF4081;
        }

        .btn:focus {
            outline: none;
        }

        .form-group {
            position: relative;
            font-size: 15px;
            color: #666;
        }

        .form-group+.form-group {
            margin-top: 30px;
        }

        .form-group .form-label {
            position: absolute;
            z-index: 1;
            left: 0;
            top: 5px;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }

        .form-group .form-control {
            width: 100%;
            position: relative;
            z-index: 3;
            height: 35px;
            background: none;
            border: none;
            padding: 5px 0;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            border-bottom: 1px solid #777;
            color: #555;
        }

        .form-group .form-control:invalid {
            outline: none;
        }

        .form-group .form-control:focus,
        .form-group .form-control:valid {
            outline: none;
            box-shadow: 0 1px #FF4081;
            border-color: #FF4081;
        }

        .form-group .form-control:focus+.form-label,
        .form-group .form-control:valid+.form-label {
            font-size: 12px;
            color: #FF4081;
            -webkit-transform: translateY(-15px);
            transform: translateY(-15px);
        }

        .alert {
            position: absolute;
            color: #f00;
            font-size: 16px;
            right: -180px;
            top: -300px;
            z-index: 200;
            padding: 30px 25px;
            background: #fff;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            opacity: 0;
            -webkit-transform: scale(0, 0);
            transform: scale(0, 0);
            -moz-transition: linear 0.4s 0.6s;
            -o-transition: linear 0.4s 0.6s;
            -webkit-transition: linear 0.4s;
            -webkit-transition-delay: 0.6s;
            -webkit-transition: linear 0.4s 0.6s;
            transition: linear 0.4s 0.6s;
        }

        .alert:after,
        .alert:before {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            background: #fff;
            left: -19px;
            bottom: -8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 50%;
        }

        .alert:before {
            width: 15px;
            height: 15px;
            left: -35px;
            bottom: -25px;
        }

        .wrong-entry {
            -webkit-animation: wrong-log 0.3s;
            animation: wrong-log 0.3s;
        }

        .wrong-entry .alert {
            opacity: 1;
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
        }

        @-webkit-keyframes eye-blink {
            to {
                height: 30px;
            }
        }

        @keyframes eye-blink {
            to {
                height: 30px;
            }
        }

        @-webkit-keyframes wrong-log {

            0%,
            100% {
                left: 0px;
            }

            20%,
            60% {
                left: 20px;
            }

            40%,
            80% {
                left: -20px;
            }
        }

        @keyframes wrong-log {

            0%,
            100% {
                left: 0px;
            }

            20%,
            60% {
                left: 20px;
            }

            40%,
            80% {
                left: -20px;
            }
        }
    </style>
</head>

<body>
    <div class="panda">
        <div class="ear"></div>
        <div class="face">
            <div class="eye-shade"></div>
            <div class="eye-white">
                <div class="eye-ball"></div>
            </div>
            <div class="eye-shade rgt"></div>
            <div class="eye-white rgt">
                <div class="eye-ball"></div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
        </div>
        <div class="body"> </div>
        <div class="foot">
            <div class="finger"></div>
        </div>
        <div class="foot rgt">
            <div class="finger"></div>
        </div>
    </div>
    @yield('content')
    <script>
        //Nhớ thêm Jquery do nghen
        //https://code.jquery.com/jquery-1.11.2.js

        $("#password").focusin(function () {
            $("form").addClass("up");
        });
        $("#password").focusout(function () {
            $("form").removeClass("up");
        });

        // Panda Eye move
        $(document).on("mousemove", function (event) {
            var dw = $(document).width() / 15;
            var dh = $(document).height() / 15;
            var x = event.pageX / dw;
            var y = event.pageY / dh;
            $(".eye-ball").css({
                width: x,
                height: y
            });
        });

        // validation

        $(".btn").click(function () {
            $("form").addClass("wrong-entry");
            setTimeout(function () {
                $("form").removeClass("wrong-entry");
            }, 3000);
        });
    </script>
</body>

</html>