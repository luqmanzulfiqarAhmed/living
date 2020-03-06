{{-- AddGraveYard --}}
@extends('AdminPages.adminHomePage')
@section('adminContent')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">CNIC</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Driver Email</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">License Number</th>
                <th scope="col">Job Experience</th>
                <th scope="col">Home Address</th>
                <th scope="col">Job Description</th>
            </tr>
        </thead>

        <tbody>
            @if(count($data)>0)
                @foreach ($data as $user)
                <tr>
                    <td>{{$user->driverFirstName}}</td>
                    <td>{{$user->driverLastName}}</td>
                    <td>{{$user->driverCNIC}}</td>
                    <td>{{$user->driverPhoneNo}}</td>
                    <td>{{$user->driverEmail}}</td>
                    <td>{{$user->driverDateofBirth}}</td>
                    <td>{{$user->driverLicenseNo}}</td>
                    <td>{{$user->driverExperience}}</td>
                    <td>{{$user->driverhomeAddress}}</td>
                    <td>{{$user->driverDescription}}</td>
                   
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>   
@endsection