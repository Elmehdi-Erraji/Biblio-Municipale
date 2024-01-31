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

                    <div class="col-xxl-3 col-sm-6">
                        <div class="card widget-flat text-bg-primary">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-group-2-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Users</h6>
                                <h2 class="my-2">7</h2>

                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-sm-6">
                        <div class="card widget-flat text-bg-info">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-shopping-basket-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Books</h6>
                                <h2 class="my-2">4</h2>

                            </div>
                        </div>
                    </div> <!-- end col-->
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card widget-flat text-bg-purple">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-wallet-2-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Reservations</h6>
                                <h2 class="my-2">5</h2>

                            </div>
                        </div>
                    </div>
                    <!-- end col-->
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


