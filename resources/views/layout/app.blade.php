<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jquery works</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background:skyblue;
        }
        ol{
            width:650px;
            margin-top:10px;
        }
        li{
            background: azure;
            margin-top: 10px;
            list-style-type: none;
            text-align: center;
            padding: 10px;
        }
        i{
            float:right;
            margin-left:10px;
            margin-right:20px ;
        }
        .line{
            text-decoration: line-through;
        }
        p{
          display: none;
        }
        textarea {
            border: none;
            background-color: transparent;
            resize: none;
            outline: none;
        }
        .textarea{
            background-color: yellow;
        }
    </style>
</head>
<body>
 @yield("content")
</body>
</html>

