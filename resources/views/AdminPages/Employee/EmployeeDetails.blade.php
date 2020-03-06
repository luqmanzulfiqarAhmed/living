{{-- EmployeeDetails --}}
@extends('AdminPages.adminHomePage')
@section('adminContent')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">CNIC</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Department</th>
                <th scope="col">Home Address</th>
                <th scope="col">Description</th>
            </tr>
        </thead>

        <tbody>
            @if(count($data)>0)
                @foreach ($data as $user)
                <tr>
                    <td>{{$user->employeeFirstName}}</td>
                    <td>{{$user->employeeLastName}}</td>
                    <td>{{$user->employeeCNIC}}</td>
                    <td>{{$user->employeeEmail}}</td>
                    <td>{{$user->employeePhoneNo}}</td>
                    <td>{{$user->employeeDateofBirth}}</td>
                    <td>{{$user->department}}</td>
                    <td>{{$user->homeAddress}}</td>
                    <td>{{$user->employeeDescription}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>   
@endsection