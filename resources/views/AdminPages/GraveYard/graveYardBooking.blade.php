{{-- AddGraveYard --}}
@extends('AdminPages.adminHomePage')
@section('adminContent')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Resident Name</th>
                <th scope="col">Resident CNIC</th>
                <th scope="col">Resident Mobile No</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Booking Time</th>
                <th scope="col">Status</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
        </tbody>
    </table>   
@endsection