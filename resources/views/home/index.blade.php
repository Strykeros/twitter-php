<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter clone</title>
</head>
<body>
    @include('components.header')

    @if(auth()->user())
        <h1>logged in</h1> 
    @else
        <h1>hello, guest! login or register to get started.</h1>   
    @endif
    hello
</body>
</html>