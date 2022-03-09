@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign-On</title>
        <link rel="stylesheet" href="{{ asset('css/login.css')  }}">
    </head>

    <div class="login">
        <h1>Login</h1>
        <form method="post" accept-charset="UTF-8" action="{{  route('login') }}">
            {{csrf_field()}}
            <input type="name" name="username" placeholder="Username" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Log-in</button>
        </form>
        <div></div>

        <a href="{{ route('signup') }}" class="btn btn-primary btn-block btn-large">Sign-up</a>
    </div>

</html>
