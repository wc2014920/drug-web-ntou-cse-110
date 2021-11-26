<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                trigger:'hover',
                placement:'right',
            });
        });
        // $(document).ready(function(){
        //     var stars=800;  /*星星的密集程度，数字越大越多*/
        //     var $stars=$(".stars");
        //     var r=800;   /*星星的看起来的距离,值越大越远,可自行调制到自己满意的样子*/
        //     for(var i=0;i<stars;i++){
        //         var $star=$("<div/>").addClass("star");
        //         $stars.append($star);
        //     }
        //     $(".star").each(function(){
        //         var cur=$(this);
        //         var s=0.2+(Math.random()*1);
        //         var curR=r+(Math.random()*300);
        //         cur.css({
        //             transformOrigin:"0 0 "+curR+"px",
        //             transform:" translate3d(0,0,-"+curR+"px) rotateY("+(Math.random()*360)+"deg) rotateX("+(Math.random()*-50)+"deg) scale("+s+","+s+")"
        //
        //         })
        //     })
        // })
    </script>
    <!-- Styles -->
    <style>
    {{--    /* ---- reset ---- */--}}

    {{--    body,--}}
    {{--    html {--}}
    {{--        width: 100%;--}}
    {{--        height: 100%;--}}
    {{--        margin: 0;--}}
    {{--        font: normal 100% Arial, Helvetica, sans-serif;--}}
    {{--        background-color: dodgerblue;--}}
    {{--    }--}}

    {{--    svg {--}}
    {{--        position: absolute;--}}
    {{--        top: 0;--}}
    {{--        left: 0px;--}}
    {{--        width: 40px;--}}
    {{--        height: 600px;--}}
    {{--    }--}}

    {{--    .container {--}}
    {{--        margin: 0 auto;--}}
    {{--        height: 600px;--}}
    {{--        text-align: center;--}}
    {{--    }--}}

    {{--    .bg-bubbles {--}}
    {{--        position: absolute;--}}
    {{--        top: 0;--}}
    {{--        left: 0;--}}
    {{--        width: 100%;--}}
    {{--        height: 100%;--}}
    {{--    }--}}

    {{--    .bg-bubbles li {--}}
    {{--        position: absolute;--}}
    {{--        list-style: none;--}}
    {{--        display: block;--}}
    {{--        width: 40px;--}}
    {{--        height: 40px;--}}
    {{--        background-color: rgba(255, 255, 255, 0.15);--}}
    {{--        bottom: -90px;--}}
    {{--        border-radius: 50%;--}}
    {{--        -webkit-animation: square 25s infinite;--}}
    {{--        animation: square 25s infinite;--}}
    {{--        -webkit-transition-timing-function: linear;--}}
    {{--        transition-timing-function: linear;--}}
    {{--        -webkit-animation-direction: alternate;--}}
    {{--        /* Chrome, Safari, Opera */--}}

    {{--        animation-direction: alternate;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(1) {--}}
    {{--        left: 10%;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(2) {--}}
    {{--        left: 20%;--}}
    {{--        width: 80px;--}}
    {{--        height: 80px;--}}
    {{--        -webkit-animation-delay: 2s;--}}
    {{--        animation-delay: 2s;--}}
    {{--        -webkit-animation-duration: 17s;--}}
    {{--        animation-duration: 17s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(3) {--}}
    {{--        left: 25%;--}}
    {{--        -webkit-animation-delay: 4s;--}}
    {{--        animation-delay: 4s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(4) {--}}
    {{--        left: 40%;--}}
    {{--        width: 60px;--}}
    {{--        height: 60px;--}}
    {{--        -webkit-animation-duration: 22s;--}}
    {{--        animation-duration: 22s;--}}
    {{--        background-color: rgba(255, 255, 255, 0.25);--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(5) {--}}
    {{--        left: 70%;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(6) {--}}
    {{--        left: 80%;--}}
    {{--        width: 70px;--}}
    {{--        height: 70px;--}}
    {{--        -webkit-animation-delay: 3s;--}}
    {{--        animation-delay: 3s;--}}
    {{--        background-color: rgba(255, 255, 255, 0.2);--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(7) {--}}
    {{--        left: 32%;--}}
    {{--        width: 90px;--}}
    {{--        height: 90px;--}}
    {{--        -webkit-animation-delay: 7s;--}}
    {{--        animation-delay: 7s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(8) {--}}
    {{--        left: 55%;--}}
    {{--        width: 20px;--}}
    {{--        height: 20px;--}}
    {{--        -webkit-animation-delay: 15s;--}}
    {{--        animation-delay: 15s;--}}
    {{--        -webkit-animation-duration: 40s;--}}
    {{--        animation-duration: 40s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(9) {--}}
    {{--        left: 25%;--}}
    {{--        width: 10px;--}}
    {{--        height: 10px;--}}
    {{--        -webkit-animation-delay: 2s;--}}
    {{--        animation-delay: 2s;--}}
    {{--        -webkit-animation-duration: 40s;--}}
    {{--        animation-duration: 40s;--}}
    {{--        background-color: rgba(255, 255, 255, 0.3);--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(10) {--}}
    {{--        left: 90%;--}}
    {{--        width: 60px;--}}
    {{--        height: 60px;--}}
    {{--        -webkit-animation-delay: 11s;--}}
    {{--        animation-delay: 11s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(11) {--}}
    {{--        left: 65%;--}}
    {{--        -webkit-animation-duration: 13s;--}}
    {{--        animation-duration: 13s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(12) {--}}
    {{--        left: 75%;--}}
    {{--        width: 30px;--}}
    {{--        height: 30px;--}}
    {{--        -webkit-animation-delay: 7s;--}}
    {{--        animation-delay: 7s;--}}
    {{--        -webkit-animation-duration: 13s;--}}
    {{--        animation-duration: 13s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(13) {--}}
    {{--        left: 55%;--}}
    {{--        -webkit-animation-delay: 7s;--}}
    {{--        animation-delay: 7s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(14) {--}}
    {{--        left: 90%;--}}
    {{--        width: 44px;--}}
    {{--        height: 44px;--}}
    {{--        -webkit-animation-duration: 12s;--}}
    {{--        animation-duration: 12s;--}}
    {{--        background-color: rgba(255, 255, 255, 0.25);--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(15) {--}}
    {{--        left: 4%;--}}
    {{--        -webkit-animation-delay: 5s;--}}
    {{--        animation-delay: 5s;--}}
    {{--        -webkit-animation-duration: 8s;--}}
    {{--        animation-duration: 8s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(16) {--}}
    {{--        left: 66%;--}}
    {{--        width: 50px;--}}
    {{--        height: 50px;--}}
    {{--        -webkit-animation-delay: 13s;--}}
    {{--        animation-delay: 13s;--}}
    {{--        background-color: rgba(255, 255, 255, 0.2);--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(17) {--}}
    {{--        left: 32%;--}}
    {{--        width: 90px;--}}
    {{--        height: 90px;--}}
    {{--        -webkit-animation-delay: 7s;--}}
    {{--        animation-delay: 7s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(18) {--}}
    {{--        left: 55%;--}}
    {{--        width: 20px;--}}
    {{--        height: 20px;--}}
    {{--        -webkit-animation-delay: 5s;--}}
    {{--        animation-delay: 5s;--}}
    {{--        -webkit-animation-duration: 20s;--}}
    {{--        animation-duration: 20s;--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(19) {--}}
    {{--        left: 88%;--}}
    {{--        width: 10px;--}}
    {{--        height: 10px;--}}
    {{--        -webkit-animation-delay: 12s;--}}
    {{--        animation-delay: 12s;--}}
    {{--        -webkit-animation-duration: 10s;--}}
    {{--        animation-duration: 10s;--}}
    {{--        background-color: rgba(255, 255, 255, 0.3);--}}
    {{--    }--}}

    {{--    .bg-bubbles li:nth-child(20) {--}}
    {{--        left: 58%;--}}
    {{--        width: 60px;--}}
    {{--        height: 60px;--}}
    {{--        -webkit-animation-delay: 14s;--}}
    {{--        animation-delay: 14s;--}}
    {{--    }--}}

    {{--    @-webkit-keyframes square {--}}
    {{--        0% {--}}
    {{--            -webkit-transform: translateY(0);--}}
    {{--            transform: translateY(0);--}}
    {{--        }--}}
    {{--        100% {--}}
    {{--            -webkit-transform: translateY(-900px) rotate(600deg);--}}
    {{--            transform: translateY(-900px) rotate(600deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @keyframes square {--}}
    {{--        0% {--}}
    {{--            -webkit-transform: translateY(0);--}}
    {{--            transform: translateY(0);--}}
    {{--        }--}}
    {{--        100% {--}}
    {{--            -webkit-transform: translateY(-900px) rotate(600deg);--}}
    {{--            transform: translateY(-900px) rotate(600deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    .wheel-string {--}}
    {{--        z-index: -1;--}}
    {{--        background-color: orange;--}}
    {{--        width: 200px;--}}
    {{--        height: 20px;--}}
    {{--        position: absolute;--}}
    {{--        top: 160px;--}}
    {{--        left: 50%;--}}
    {{--    }--}}

    {{--    .wheel-string-one {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(-90deg);--}}
    {{--        -moz-transform: rotate(-90deg);--}}
    {{--        -o-transform: rotate(-90deg);--}}
    {{--        -ms-transform: rotate(-90deg);--}}
    {{--        transform: rotate(-90deg);--}}
    {{--    }--}}

    {{--    .wheel-string-two {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(-18deg);--}}
    {{--        -moz-transform: rotate(-18deg);--}}
    {{--        -o-transform: rotate(-18deg);--}}
    {{--        -ms-transform: rotate(-18deg);--}}
    {{--        transform: rotate(-18deg);--}}
    {{--    }--}}

    {{--    .wheel-string-three {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(54deg);--}}
    {{--        -moz-transform: rotate(54deg);--}}
    {{--        -o-transform: rotate(54deg);--}}
    {{--        -ms-transform: rotate(54deg);--}}
    {{--        transform: rotate(54deg);--}}
    {{--    }--}}

    {{--    .wheel-string-four {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(126deg);--}}
    {{--        -moz-transform: rotate(126deg);--}}
    {{--        -o-transform: rotate(126deg);--}}
    {{--        -ms-transform: rotate(126deg);--}}
    {{--        transform: rotate(126deg);--}}
    {{--    }--}}

    {{--    .wheel-string-five {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(198deg);--}}
    {{--        -moz-transform: rotate(126deg);--}}
    {{--        -o-transform: rotate(126deg);--}}
    {{--        -ms-transform: rotate(126deg);--}}
    {{--        transform: rotate(198deg);--}}
    {{--    }--}}

    {{--    .wheel-wrapper {--}}
    {{--        background-color: deepskyblue ;--}}
    {{--        width: 600px;--}}
    {{--        height: 600px;--}}
    {{--        position: relative;--}}
    {{--        margin: auto auto;--}}
    {{--        overflow: hidden;--}}
    {{--        transition: transform 0.4s ease;--}}
    {{--    }--}}

    {{--    @-webkit-keyframes wheel-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-moz-keyframes wheel-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-o-keyframes wheel-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @keyframes wheel-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-webkit-keyframes icon-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(360deg);--}}
    {{--            -moz-transform: rotate(360deg);--}}
    {{--            -o-transform: rotate(360deg);--}}
    {{--            -ms-transform: rotate(360deg);--}}
    {{--            transform: rotate(360deg);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(0deg);--}}
    {{--            -moz-transform: rotate(0deg);--}}
    {{--            -o-transform: rotate(0deg);--}}
    {{--            -ms-transform: rotate(0deg);--}}
    {{--            transform: rotate(0deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-moz-keyframes icon-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(360deg);--}}
    {{--            -moz-transform: rotate(360deg);--}}
    {{--            -o-transform: rotate(360deg);--}}
    {{--            -ms-transform: rotate(360deg);--}}
    {{--            transform: rotate(360deg);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(0deg);--}}
    {{--            -moz-transform: rotate(0deg);--}}
    {{--            -o-transform: rotate(0deg);--}}
    {{--            -ms-transform: rotate(0deg);--}}
    {{--            transform: rotate(0deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-o-keyframes icon-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(360deg);--}}
    {{--            -moz-transform: rotate(360deg);--}}
    {{--            -o-transform: rotate(360deg);--}}
    {{--            -ms-transform: rotate(360deg);--}}
    {{--            transform: rotate(360deg);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(0deg);--}}
    {{--            -moz-transform: rotate(0deg);--}}
    {{--            -o-transform: rotate(0deg);--}}
    {{--            -ms-transform: rotate(0deg);--}}
    {{--            transform: rotate(0deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @keyframes icon-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(360deg);--}}
    {{--            -moz-transform: rotate(360deg);--}}
    {{--            -o-transform: rotate(360deg);--}}
    {{--            -ms-transform: rotate(360deg);--}}
    {{--            transform: rotate(360deg);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(0deg);--}}
    {{--            -moz-transform: rotate(0deg);--}}
    {{--            -o-transform: rotate(0deg);--}}
    {{--            -ms-transform: rotate(0deg);--}}
    {{--            transform: rotate(0deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    .wheel-string {--}}
    {{--        z-index: -1;--}}
    {{--        background-color: orange;--}}
    {{--        width: 200px;--}}
    {{--        height: 20px;--}}
    {{--        position: absolute;--}}
    {{--        top: 160px;--}}
    {{--        left: 50%;--}}
    {{--    }--}}

    {{--    .wheel-string-one {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(-90deg);--}}
    {{--        -moz-transform: rotate(-90deg);--}}
    {{--        -o-transform: rotate(-90deg);--}}
    {{--        -ms-transform: rotate(-90deg);--}}
    {{--        transform: rotate(-90deg);--}}
    {{--    }--}}

    {{--    .wheel-string-two {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(-18deg);--}}
    {{--        -moz-transform: rotate(-18deg);--}}
    {{--        -o-transform: rotate(-18deg);--}}
    {{--        -ms-transform: rotate(-18deg);--}}
    {{--        transform: rotate(-18deg);--}}
    {{--    }--}}

    {{--    .wheel-string-three {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(54deg);--}}
    {{--        -moz-transform: rotate(54deg);--}}
    {{--        -o-transform: rotate(54deg);--}}
    {{--        -ms-transform: rotate(54deg);--}}
    {{--        transform: rotate(54deg);--}}
    {{--    }--}}

    {{--    .wheel-string-four {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(126deg);--}}
    {{--        -moz-transform: rotate(126deg);--}}
    {{--        -o-transform: rotate(126deg);--}}
    {{--        -ms-transform: rotate(126deg);--}}
    {{--        transform: rotate(126deg);--}}
    {{--    }--}}

    {{--    .wheel-string-five {--}}
    {{--        -webkit-transform-origin: 0 50%;--}}
    {{--        -moz-transform-origin: 0 0;--}}
    {{--        -o-transform-origin: 0 0;--}}
    {{--        -ms-transform-origin: 0 0;--}}
    {{--        transform-origin: 0 50%;--}}
    {{--        -webkit-transform: rotate(198deg);--}}
    {{--        -moz-transform: rotate(126deg);--}}
    {{--        -o-transform: rotate(126deg);--}}
    {{--        -ms-transform: rotate(126deg);--}}
    {{--        transform: rotate(198deg);--}}
    {{--    }--}}

    {{--    .wheel-wrapper {--}}
    {{--        background-color: #000000;--}}
    {{--        width: 600px;--}}
    {{--        height: 600px;--}}
    {{--        position: relative;--}}
    {{--        margin: auto auto;--}}
    {{--        overflow: hidden;--}}
    {{--        transition: transform 0.4s ease;--}}
    {{--    }--}}

    {{--    @-webkit-keyframes wheel-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-moz-keyframes wheel-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-o-keyframes wheel-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @keyframes wheel-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(0deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -moz-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -o-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            -ms-transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--            transform: rotate(360deg) translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-webkit-keyframes icon-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(360deg);--}}
    {{--            -moz-transform: rotate(360deg);--}}
    {{--            -o-transform: rotate(360deg);--}}
    {{--            -ms-transform: rotate(360deg);--}}
    {{--            transform: rotate(360deg);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(0deg);--}}
    {{--            -moz-transform: rotate(0deg);--}}
    {{--            -o-transform: rotate(0deg);--}}
    {{--            -ms-transform: rotate(0deg);--}}
    {{--            transform: rotate(0deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-moz-keyframes icon-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(360deg);--}}
    {{--            -moz-transform: rotate(360deg);--}}
    {{--            -o-transform: rotate(360deg);--}}
    {{--            -ms-transform: rotate(360deg);--}}
    {{--            transform: rotate(360deg);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(0deg);--}}
    {{--            -moz-transform: rotate(0deg);--}}
    {{--            -o-transform: rotate(0deg);--}}
    {{--            -ms-transform: rotate(0deg);--}}
    {{--            transform: rotate(0deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @-o-keyframes icon-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(360deg);--}}
    {{--            -moz-transform: rotate(360deg);--}}
    {{--            -o-transform: rotate(360deg);--}}
    {{--            -ms-transform: rotate(360deg);--}}
    {{--            transform: rotate(360deg);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(0deg);--}}
    {{--            -moz-transform: rotate(0deg);--}}
    {{--            -o-transform: rotate(0deg);--}}
    {{--            -ms-transform: rotate(0deg);--}}
    {{--            transform: rotate(0deg);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    @keyframes icon-rotate {--}}
    {{--        from {--}}
    {{--            -webkit-transform: rotate(360deg);--}}
    {{--            -moz-transform: rotate(360deg);--}}
    {{--            -o-transform: rotate(360deg);--}}
    {{--            -ms-transform: rotate(360deg);--}}
    {{--            transform: rotate(360deg);--}}
    {{--        }--}}
    {{--        to {--}}
    {{--            -webkit-transform: rotate(0deg);--}}
    {{--            -moz-transform: rotate(0deg);--}}
    {{--            -o-transform: rotate(0deg);--}}
    {{--            -ms-transform: rotate(0deg);--}}
    {{--            transform: rotate(0deg);--}}
    {{--        }--}}
    {{--    }--}}
    {{--    .popover{--}}
    {{--        background-color: rgba(64, 66, 65, 0.24);--}}
    {{--    }--}}
    {{--    .popover-header {--}}
    {{--        color: red;--}}
    {{--    }--}}
    {{--    .popover-body {--}}
    {{--        color: #ffe600;--}}
    {{--    }--}}

    </style>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
    <div class="continer" >
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px; z-index: 2;">

                <h4>User Login
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                    @endif
                    @if(session('info'))
                        <div class="alert alert-info">
                            {{ session('info') }}
                        </div>
                    @endif
                    <a class="btn btn-primary float-right"
                       id="admin"
                       data-toggle="popover"
                       title="Attention"
                       data-content="Are you sure to login as Admin?"
                       href="{{ route('admin.login') }}">
                        Admin
                    </a></h4><br>
                <form action="{{ route('user.check') }}" method="post">
                    @if(session('fail'))
                        <div class="alert alert-danger">
                          {{ session('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address."
                               value={{ old('email') }}>
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="custom-control-inline">Password</label><a class="float-right" href="{{ route('forget.password.get') }}">Forget Password?</a>
                        <input type="password" class="form-control" name="password" placeholder="Enter password."
                               value={{ old('password') }}>
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a class="btn btn-primary float-right" href="{{ route('user.register') }}">Create new Account</a>
                    </div>
                </form>
            </div>
{{--            <div class="bgbubble" style="z-index: 1">--}}
{{--                <ul class="bg-bubbles" style="z-index: -11">--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
            </div>

        </div>
    <div id="particles-js" ></div>

</body>

</html>
