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
                                <h4 class="header-title">Add a new book</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="{{ route('books.update',['book'=>$book->id]) }}" method="POST" enctype="multipart/form-data" id="addBookForm">
                                            @csrf
                                            @method('PUT') 

                                            <!-- Title -->
                                            <div class="row mb-3">
                                                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                                                <div class="col-md-6">
                                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$book->title) }}" >
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Author -->
                                            <div class="row mb-3">
                                                <label for="author" class="col-md-4 col-form-label text-md-end">Author</label>
                                                <div class="col-md-6">
                                                    <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author',$book->author) }}" >
                                                    @error('author')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Genre -->
                                            <div class="row mb-3">
                                                <label for="genre" class="col-md-4 col-form-label text-md-end">Genre</label>
                                                <div class="col-md-6">
                                                    <input id="genre" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ old('genre',$book->genre) }}" >
                                                    @error('genre')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Description -->
                                            <div class="row mb-3">
                                                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                                                <div class="col-md-6">
                                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" >{{ old('description',$book->description) }}</textarea>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Published Date -->
                                            <div class="row mb-3">
                                                <label for="published_at" class="col-md-4 col-form-label text-md-end">Published Date</label>
                                                <div class="col-md-6">
                                                    <input id="published_at" type="date" class="form-control @error('published_at') is-invalid @enderror" name="published_at" value="{{ old('published_at', $book->published_at) }}" >
                                                    @error('published_at')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Total Copies -->
                                            <div class="row mb-3">
                                                <label for="totalCopies" class="col-md-4 col-form-label text-md-end">Total Copies</label>
                                                <div class="col-md-6">
                                                    <input id="totalCopies" type="number" class="form-control @error('totalCopies') is-invalid @enderror" name="totalCopies" value="{{ old('totalCopies',$book->totalCopies) }}" >
                                                    @error('totalCopies')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Available Copies -->
                                            <div class="row mb-3">
                                                <label for="availableCopies" class="col-md-4 col-form-label text-md-end">Available Copies</label>
                                                <div class="col-md-6">
                                                    <input id="availableCopies" type="number" class="form-control @error('availableCopies') is-invalid @enderror" name="availableCopies" value="{{ old('availableCopies',$book->availableCopies) }}" >
                                                    @error('availableCopies')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Image -->
                                            <div class="row mb-3">
                                                <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                                                <div class="col-md-6">
                                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                                    @error('image')
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
