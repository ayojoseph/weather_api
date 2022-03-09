@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/weather.css')  }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(getWeather);
            }else{
                $('#location').html('Geolocation is not supported by this browser.');
            }
        });

        function getWeather(longlat) {
            // var latitude = location.coords.latitude;
            // var longitude = location.coords.longitude;
            $.ajax({
                type: 'POST',
                url: '/weather',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'latitude=' + longlat.coords.latitude + '&longitude=' + longlat.coords.longitude,
                success: function (data) {
                    var weatherInfo = JSON.parse(data);

                    // console.log(weatherInfo);
                    if (data) {
                        $("#location").html(weatherInfo['name']);
                        $("#temperature").html(Math.floor(weatherInfo['main']['temp']));
                        $("#feels").html(Math.floor(weatherInfo['main']['feels_like']));
                        storeActivity(weatherInfo);
                    } else {
                        $("#location").html('Not Available');
                    }
                }
            });
        }

        function storeActivity(data){
            $.ajax({
                type: 'POST',
                url: '/useractivity',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'location=' + data['name'] + '&country=' + data['sys']['country']
            });
        }

    </script>

    <title>Weather</title>
    <div class="login">
        <p>Your Location is: <span id="location"></span></p>
        <p>Temp: <span id="temperature"></span></p>
        <p>Feels Like: <span id="feels"></span></p>
    </div>

</head>

<body>

</body>

</html>
