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
                                <h4 class="header-title">Add a new user</h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" id="updateUserForm">
                                            @csrf
                                            @method('PUT') 

                                            <!-- Name -->
                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">UserName</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- User Role -->
                                            <div class="row mb-3">
                                                <label for="role" class="col-md-4 col-form-label text-md-end">User Role</label>
                                                <div class="col-md-6">
                                                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                                        <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Admin</option>
                                                        <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Client</option>
                                                    </select>
                                                    @error('role')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                
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


