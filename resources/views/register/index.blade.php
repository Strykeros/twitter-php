<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter clone</title>
</head>
<body>
    @include('components.header')
    <form action="/validate-register" method="POST">
        @csrf
        <div>
            <label for="username">Username*</label>
            <input type="text" id="username" name="username" >
        </div>
        <div>
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" >
        </div>
        <div>
            <label for="password">Password*</label>
            <input type="password" id="password" name="password" >
        </div>
        <div>
            <label for="passwordRepeat">Password repeat*</label>
            <input type="password" id="passwordRepeat" name="passwordRepeat" >
        </div>
        <div>
            <p>* - required fields.</p>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>