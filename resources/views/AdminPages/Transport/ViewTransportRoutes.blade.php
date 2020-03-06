@extends('AdminPages.adminHomePage')
@section('adminContent')
<div class="panel-heading">
    <h3 class="panel-title">Vehical Details</h3>
</div> <br> <br>
    <table class="table">     
        <thead class="thead-dark">
            <tr>
                <th scope="col">Vehical Number</th>
                <th scope="col">Driver Name</th>
                <th scope="col">Driver Phone Number</th>
                <th scope="col">Departure Location</th>
                <th scope="col">Departure Time</th>
                <th scope="col">Arrival Location</th>
                <th scope="col">Arrival Time</th>
                <th scope="col">Bus Stop</th>
            </tr>
        </thead>

        <tbody>
            @if(count($data)>0)
            @foreach ($data as $user)
            <tr>
                <td>{{$user->vehicalNumber}}</td>
                <td>{{$user->driverName}}</td>
                <td>{{$user->driverPhoneNo}}</td>
                <td>{{$user->departurelocation}}</td>
                <td>{{$user->departureTime}}</td>
                <td>{{$user->arrivallocation}}</td>
                <td>{{$user->arrivalTime}}</td>
                <td>{{$user->busStop}}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>   
@endsection