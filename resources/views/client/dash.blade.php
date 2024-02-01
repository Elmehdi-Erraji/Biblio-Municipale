

@extends('layouts.client')

@section('content')

<body>
    <div class="wrapper">


        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                 

                    <!-- Books show start  -->

                    <div class="row">
                        @foreach($books as $book)
                            <div class="col-sm-6">
                                <div class="card card-body">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text"><strong>Id:{{$book->id}}</p>
                                    <p class="card-text"><strong>title:{{$book->title}}</p>
                                    <p class="card-text"><strong>Author:{{$book->author}}</p>
                                    <p class="card-text"><strong>Genre:{{$book->genre}}</p>
                                    <p class="card-text"><strong>Description:{{$book->description}}</p>
                                    <p class="card-text"><strong>Publication Year:{{$book->published_at}}</p>
                                    <p class="card-text"><strong>Total Copies:{{$book->totalCopies}}</p>
                                    <p class="card-text"><strong>Available Copies:{{$book->availableCopies}}</p>
                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="openModal('{{$book->id}}','{{$book->title}}', '{{$book->author}}', '{{$book->genre}}','{{$book->description}}', '{{$book->published_at}}', '{{$book->totalCopies}}', '{{$book->availableCopies}}')">Reserve This book</a>
                                </div>
                            </div>
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

                            <form id="reservationForm" method="post" action="{{route('client.store')}}">
                                @csrf
                            <input type="hidden" id="bookIdInput" name="bookId" value="">
                            <input type="hidden" id="" name="user_id" value="{{auth()->user()->id}}">
                            <input type="hidden" id="" name="book_id" value="{{$book->id}}">
                            
                                <div class="mb-3">
                                    <label for="reservationDate" class="form-label">Reservation Date</label>
                                    <input class="form-control" type="date" id="reservationDate" name="reservation_date" required>
                                </div>

                                <div class="mb-3">
                                    <label for="returnDate" class="form-label">Return Date (Max 20 days from reservation)</label>
                                    <input class="form-control" type="date" id="returnDate" name="return_date" required>
                                </div>

                                <button type="submit" id="reserveButton" class="btn btn-primary">Reserve Book</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function openModal(bookId,title, author, genre, description, publicationYear, totalCopies, availableCopies) {
                    document.getElementById('bookId').innerText = bookId;
                    document.getElementById('bookIdInput').value = bookId;
                    document.getElementById('bookTitle').innerText = title;
                    document.getElementById('bookAuthor').innerText = author;
                    document.getElementById('bookGenre').innerText = genre;
                    document.getElementById('bookDescription').innerText = description;
                    document.getElementById('bookPublicationYear').innerText = publicationYear;
                    document.getElementById('bookTotalCopies').innerText = totalCopies;
                    document.getElementById('bookAvailableCopies').innerText = availableCopies;

                    $('#reserve-modal').modal('show'); // Show the modal

                    // Handle reservation button click
                    document.getElementById('reserveButton').addEventListener('click', function() {
                        const reservationDate = document.getElementById('reservationDate').value;
                        const returnDate = document.getElementById('returnDate').value;

                        // Perform date verification
                        const today = new Date();
                        const selectedResDate = new Date(reservationDate);
                        const selectedRetDate = new Date(returnDate);

                        // Check if reservation date is in the past
                        if (selectedResDate < today) {
                            document.getElementById('errorMessages').innerText = 'Please choose a reservation date in the future.';
                            return;
                        }

                        // Check if return date is after reservation date
                        if (selectedResDate >= selectedRetDate) {
                            document.getElementById('errorMessages').innerText = 'Return date must be after the reservation date.';
                            return;
                        }

                        // Calculate the difference in days between reservation and return dates
                        const timeDiff = Math.abs(selectedRetDate - selectedResDate);
                        const diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

                        // Check if return date is beyond the limit (20 days)
                        if (diffDays > 20) {
                            document.getElementById('errorMessages').innerText = 'Return date exceeds the maximum limit of 20 days from the reservation date.';
                            return;
                        }

                        // Here, you can proceed with the reservation process
                        console.log('Reservation Date:', reservationDate);
                        console.log('Return Date:', returnDate);
                    });

                    // Clear error messages when the modal is closed
                    $('#reserve-modal').on('hidden.bs.modal', function() {
                        document.getElementById('errorMessages').innerText = '';
                    });
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

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

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
