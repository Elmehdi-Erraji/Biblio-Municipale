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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title">Update A Reservation</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}" method="POST" enctype="multipart/form-data" id="addBookForm">
                                            @csrf
                                            @method('PUT') 

                                            
                                            <!-- reservation Date -->
                                            <div class="row mb-3">
                                                <label for="reservation_date" class="col-md-4 col-form-label text-md-end">Published Date</label>
                                                <div class="col-md-6">
                                                    <input id="reservation_date" type="date" class="form-control @error('reservation_date') is-invalid @enderror" name="reservation_date" value="{{old('reservation',$reservation->reservation_date)}}" >
                                                    @error('reservation_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Return Date -->
                                            <div class="row mb-3">
                                                <label for="return_date" class="col-md-4 col-form-label text-md-end">Return Date</label>
                                                <div class="col-md-6">
                                                    <input id="return_date" type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" value="{{old('reservation',$reservation->return_date)}}" >
                                                    @error('return_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                          

                                            <div class="row mb-3">
                                                <label for="is_returned" class="col-md-4 col-form-label text-md-end">Reservation Status </label>
                                                <div class="col-md-6">
                                                    <select class="form-select @error('is_returned') is-invalid @enderror" id="is_returned" name="is_returned">
                                                        <option value="0" {{ old('reservation', $reservation->is_returned) == 0 ? 'selected' : '' }}>Pending</option>
                                                        <option value="1" {{ old('reservation', $reservation->is_returned) == 1 ? 'selected' : '' }}>Not Returned</option>
                                                        <option value="2" {{ old('reservation', $reservation->is_returned) == 2 ? 'selected' : '' }}>Returned</option>
                                                    </select>
                                                    @error('is_returned')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                           

                                            <!-- Submit Button -->
                                            <div class="row mb-3">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <a href="{{route('reservations.index')}}"><button type="button" class="btn btn-dark">Back</button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


