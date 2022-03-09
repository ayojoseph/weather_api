@extends('layouts.app')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
{{--    <link rel="stylesheet" href="{{ asset('css/login.css')  }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/weather.css')  }}">--}}
    <link rel="stylesheet" href="{{ asset('css/table.css')  }}">



    <title>Admin</title>
    <div class="logs">

        <div class="tbl-header">
            <table>
                <thead>
                <tr>
                    <th>User</th>
                    <th>Location</th>
                    <th>Timestamp</th>
                </tr>
                </thead>
            </table>
        </div>

        @if($activities->count())
            <div class="tbl-content">
                <table>
                    <tbody>
            @foreach( $activities as $activity)

                        <tr>
                            <td>{{ $activity->user->first_name }} {{ $activity->user->last_name }}</td>
                            <td>{{ $activity->location }}</td>
                            <td>{{ $activity->created_at }}</td>
                        </tr>


            @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p>Empty log</p>
        @endif
    </div>


</head>

<body>

</body>

</html>
