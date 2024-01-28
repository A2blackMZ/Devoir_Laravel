@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room Details</title>
</head>
<body>
    <div class="container">
        <h2>Room Details</h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Hotel Name</th>
                    <td>{{ $room->hotel_name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $room->description }}</td>
                </tr>
                <tr>
                    <th>Room Name</th>
                    <td>{{ $room->room_name }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $room->price }}</td>
                </tr>
                <tr>
                    <th>Bed Numbers</th>
                    <td>{{ $room->bed_numbers }}</td>
                </tr>
                <tr>
                    <th>Adult Max</th>
                    <td>{{ $room->adult_max }}</td>
                </tr>
                <tr>
                    <th>Kid Max</th>
                    <td>{{ $room->kid_max }}</td>
                </tr>
                <tr>
                    <th>Features</th>
                    <td>{{ $room->features }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($room->status == 1)
                            Available
                        @else
                            Unavailable
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>
</html>
@endsection
