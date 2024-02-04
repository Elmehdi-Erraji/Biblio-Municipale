@extends('layouts.app')


@section('content')

<body>
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Welcome!</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Welcome!</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">


                    <div class="col-12">
                        <!-- Todo-->
                        <div class="card">
                            <div class="card-body p-0">

                                <div class="p-3">
                                    
                                   
                                </div>


                                <div id="yearly-sales-collapse" class="collapse show">

                                    <div class="table-responsive">
                                       

                                        <table class="table table-nowrap table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Book ID</th>
                                                    <th>User ID</th>
                                                    <th>Reservation date</th>
                                                    <th>Return Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->id }}</td>
                                                        <td>{{ $reservation->book->title }}</td>
                                                        <td>{{ $reservation->user->name}}</td>
                                                        <td>{{ $reservation->reservation_date }}</td>
                                                        <td>{{ $reservation->return_date }}</td>
                                                        <td>
                                                            @php
                                                                $returnStatus = $reservation->is_returned;
                                                                if ($returnStatus === 0) {
                                                                    echo '<span class="badge bg-warning-subtle text-warning">Pending</span>';
                                                                } elseif ($returnStatus === 1) {
                                                                    echo '<span class="badge bg-pink-subtle text-pink">Not Returned</span>';
                                                                } elseif ($returnStatus === 2) {
                                                                    echo '<span class="badge bg-info-subtle text-info">Returned</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-warning">Unknown Status</span>';
                                                                }
                                                            @endphp
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('reservations.destroy', $reservation->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $reservation->id }}').submit();">Delete</a>
                                                            <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-info">Update</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
</body>




<footer class="footer footer-alt fw-medium">
    <span class="text-dark-emphasis">
        <script>
            document.write(new Date().getFullYear())
        </script> © Mehdi
    </span>
</footer>
@endsection


