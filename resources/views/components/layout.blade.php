<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Aulab Post</title>
    @vite(['resources/css/app.css','resources/js/app.js']);
</head>
<body>
<x-navbar></x-navbar>   
<x-success></x-success>
<div>
    {{$slot}}
</div>


</body>
</html>