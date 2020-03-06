{{-- AddGraveYard --}}
@extends('AdminPages.adminHomePage')
@section('adminContent')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">CNIC</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Type</th>
                <th scope="col">Experience</th>
                <th scope="col">Home Address</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @if(count($data)>0)
                @foreach ($data as $user)
                <tr>
                    <td>{{$user->mStaffFirstName}}</td>
                    <td>{{$user->mStaffLastName}}</td>
                    <td>{{$user->mStaffCNIC}}</td>
                    <td>{{$user->mStaffPhoneNo}}</td>
                    <td>{{$user->mStaffEmail}}</td>
                    <td>{{$user->DateofBirth}}</td>
                    <td>{{$user->mStaffType}}</td>
                    <td>{{$user->mStaffExperience}}</td>
                    <td>{{$user->mStaffhomeAddress}}</td>
                    <td>{{$user->mStaffDescription}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>   
@endsection