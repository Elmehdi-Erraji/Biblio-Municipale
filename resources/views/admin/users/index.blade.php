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


                    <div class="col-xl-8">
                        <!-- Todo-->
                        <div class="card">
                            <div class="card-body p-0">

                                <div class="p-3">
                                    <div class="card-widgets">
                                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <a href="{{route('users.create')}}"><button type="button" class="btn btn-info">Add a new User</button></a>
                                    <br>
                                    <br>
                                    <div class="app-search d-none d-lg-block">
                                        <form style="width: 40%;" id="searchForm">
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search..." id="searchInput">
                                                <span class="ri-search-line search-icon text-muted"></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div id="yearly-sales-collapse" class="collapse show">

                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-0" id="userTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>username</th>
                                                    <th>E-mail</th>
                                                    <th>Phone</th>
                                                    <th>Created at</th>
                                                    <th>Role</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($users as $user)
                                                   
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->phone}}</td>
                                                        <th>{{$user->created_at->format('d-m-Y')}}</th>
                                                        <td>
                                                            @if ($user->role == 1)
                                                                Admin
                                                            @elseif ($user->role == 2)
                                                                Client
                                                            @else
                                                                Unknown Role
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="{{route ('users.edit',$user->id)}}" class="btn btn-info">Update</a>
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
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


