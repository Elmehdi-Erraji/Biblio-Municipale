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
                        <div class="card widget-flat text-bg-info">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="ri-book-2-line widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Books</h6>
                                <h2 class="my-2">4</h2>

                            </div>
                        </div>
                    </div>
                    
                    <!-- end col-->
                </div>

                <div class="row">


                    <div class="col-12">
                        <!-- Todo-->
                        <div class="card">
                            <div class="card-body p-0">

                                <div class="p-3">
                                    <div class="card-widgets">
                                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <a href="{{route('books.create')}}"><button type="button" class="btn btn-info">Add a new Book</button></a>
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
                                        <table class="table table-nowrap table-hover mb-0" id="bookTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>Genre</th>
                                                    <th>Description</th>
                                                    <th>Published at</th>
                                                    <th>Total Copies</th>
                                                    <th>Available Copies</th>
                                                    <th>Deleted</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($books as $book)
                                                    <tr>
                                                        <td>{{ $book->id }}</td>
                                                        <td>{{ $book->title }}</td>
                                                        <td>{{ $book->author }}</td>
                                                        <td>{{ $book->genre }}</td>
                                                        <td>{{ Str::limit($book->description, 70) }}</td>
                                                        <td>{{ $book->published_at->format('d-m-Y') }}</td>
                                                        <td>{{ $book->totalCopies }}</td>
                                                        <td>{{ $book->availableCopies }}</td>
                                                        <td>{{ $book->deleted_at ? 'Yes' : 'No' }}</td>
                                                        <td>
                                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Update</a>
                                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                            </form>
                                                            @if ($book->deleted_at)
                                                            <!-- Restore action -->
                                                            <form action="{{ route('books.restore', $book->id) }}" method="POST" style="display: inline-block;">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success">Restore</button>
                                                            </form>
                                                        @endif
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


