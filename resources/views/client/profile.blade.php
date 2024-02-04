

@extends('layouts.client')

@section('content')

<body>
   


    
        <div class="content" style="padding-left: 10%; padding-right: 10%;">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            
                            <h4 class="page-title">Welcome</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xxl-3 col-sm-6">
                        <div class="card widget-flat text-bg-info">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-shopping-basket-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">My Reservations</h6>
                                <h2 class="my-2">{{$reservationsCount}}</h2>

                            </div>
                        </div>
                    </div> <!-- end col-->

                    <!-- end col-->
                </div>

                        <div class="row">
                                <div class="col-12">
                                    <!-- Todo-->
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="p-3">
                                             
                                            </div>


                                            <div id="yearly-sales-collapse" class="collapse show">

                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-hover mb-0" >
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Book ID</th>
                                                               
                                                                <th>Reservation date</th>
                                                                <th>Return Date</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($MyReservations as $myreservation)
                                                                <tr>
                                                                    <td>{{ $myreservation->id }}</td>
                                                                    <td>{{ $myreservation->book->title }}</td>
                                                                
                                                                    <td>{{ $myreservation->reservation_date }}</td>
                                                                    <td>{{ $myreservation->return_date }}</td>
                                                                    <td>
                                                                        @php
                                                                            $returnStatus = $myreservation->is_returned;
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
                                                                        <form action="{{ route('reservations.destroy', $myreservation->id) }}" method="POST" style="display: inline-block;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
               




                            
                          

                        </div>
                  

                    </div>

                 

                </div>
        

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Created by<b> Mehdi</b>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

   


            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Created by<b> Mehdi</b>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    
</body>

@endsection 
