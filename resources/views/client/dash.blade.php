

@extends('layouts.client')

@section('content')

<body>
   


      
            <div class="content" style="padding-left: 10%; padding-right: 2%;

                <!-- Start Content-->
                <div class="container-fluid">

                 

                    <!-- Books show start  -->

                    <div class="row">
                        @foreach($books as $book)
                            <div class="col-sm-6"style="width : 30%">
                                <div class="card card-body">
                                    <h4 class="card-title">{{$book->title}}</h4>
                                    <p class="card-text"><strong>Id:</strong> {{$book->id}}</p>
                                    <p class="card-text"><strong>Author:</strong> {{$book->author}}</p>
                                    <p class="card-text"><strong>Genre:</strong> {{$book->genre}}</p>
                                    <p class="card-text"><strong>Description:</strong> {{$book->description}}</p>
                                    <p class="card-text"><strong>Publication Date:</strong> {{$book->published_at->format('Y-m-d')}}</p>
                                    <p class="card-text"><strong>Total Copies:</strong> {{$book->totalCopies}}</p>
                                    <p class="card-text"><strong>Available Copies:</strong> {{$book->availableCopies}}</p>
                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="openModal('{{$book->id}}','{{$book->title}}', '{{$book->author}}', '{{$book->genre}}','{{$book->description}}', '{{$book->published_at}}', '{{$book->totalCopies}}', '{{$book->availableCopies}}')" style="width: 35%">Reserve This book</a>
                                </div>
                            </div>
                            @if($loop->iteration % 3 == 0)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>
                    <!-- Books show end -->



                </div> <!-- container -->

            </div> <!-- content -->

            <div id="reserve-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <!-- Modal content -->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Book Reservation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4 id="bookTitle" class="mb-3"></h4>
                            <p><strong>Book ID:</strong> <span id="bookId"></span></p>
                            <p><strong>Author:</strong> <span id="bookAuthor"></span></p>
                            <p><strong>Genre:</strong> <span id="bookGenre"></span></p>
                            <p><strong>Description:</strong> <span id="bookDescription"></span></p>
                            <p><strong>Publication Year:</strong> <span id="bookPublicationYear"></span></p>
                            <p><strong>Total Copies:</strong> <span id="bookTotalCopies"></span></p>
                            <p><strong>Available Copies:</strong> <span id="bookAvailableCopies"></span></p>

                            <div id="errorMessages" style="color: red;"></div>

                            <form id="reservationForm" method="post" action="{{route('clients.store')}}">
                                @csrf
                            <input type="hidden" id="bookIdInput" name="bookId" value="">
                            <input type="hidden" id="" name="user_id" value="{{auth()->user()->id}}">
                            <input type="hidden" id="bookIdInput" name="book_id" value="">
                            
                                <div class="mb-3">
                                    <label for="reservationDate" class="form-label">Reservation Date</label>
                                    <input class="form-control" type="date" id="reservationDate" name="reservation_date" >
                                    @error('reservation_date')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="returnDate" class="form-label">Return Date (Max 20 days from reservation)</label>
                                    <input class="form-control" type="date" id="returnDate" name="return_date" >
                                    @error('return_date')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <button type="submit" id="reserveButton" class="btn btn-primary">Reserve Book</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function openModal(bookId, title, author, genre, description, publicationYear, totalCopies, availableCopies) {
                    document.getElementById('bookId').innerText = bookId;
                    document.getElementById('bookIdInput').value = bookId;
                    document.getElementById('bookTitle').innerText = title;
                    document.getElementById('bookAuthor').innerText = author;
                    document.getElementById('bookGenre').innerText = genre;
                    document.getElementById('bookDescription').innerText = description;
                    document.getElementById('bookPublicationYear').innerText = publicationYear;
                    document.getElementById('bookTotalCopies').innerText = totalCopies;
                    document.getElementById('bookAvailableCopies').innerText = availableCopies;
            
                    // Set the book_id value in the reservationForm
                    document.getElementById('reservationForm').elements['book_id'].value = bookId;
            
                    $('#reserve-modal').modal('show'); // Show the modal
                }
            </script>


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

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    
</body>

@endsection 
