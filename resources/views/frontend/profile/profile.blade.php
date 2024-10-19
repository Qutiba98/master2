<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <x-navigation />

    <div class="container mt-5">
        <h1 class="text-center">Profile</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Display user information -->
        <div class="card mb-4">
            <div class="card-header">User Information</div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" name="number" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>

        <h2>My Requests</h2>

        @if($inventoryRequests->isEmpty())
            <div class="alert alert-warning">You have no current requests.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Request ID</th>
                            <th>Housing Details</th>
                            <th>Status</th>
                            <th>Size</th>
                            <th>Breakable</th>
                            <th>Requested Service</th>
                            <th>Message</th>
                            <th>Total Price</th>
                            <th>Request Date</th>

    @foreach($inventoryRequests as $request)
        <th style="{{ $inventoryRequests->contains(fn($request) => $request->status_id == 4) ? '' : 'display: none;' }}">Start Date</th>
        <th style="{{ $inventoryRequests->contains(fn($request) => $request->status_id == 4) ? '' : 'display: none;' }}">End Date</th>
    @endforeach

                        </tr>
                    </thead>
                    <tbody>
    @foreach($inventoryRequests as $request)
        <tr>
            <td>{{ $request->id }}</td>
            <td>{{ $request->housing_details }}</td>
            <td>
                @if ($request->status_id == 1)
                    Pending
                @elseif ($request->status_id == 2)
                    In Progress
                @elseif ($request->status_id == 3)
                    Rejected
                @elseif ($request->status_id == 4)
                    Accepted
                @else
                    Unknown Status
                @endif
            </td>
            <td>{{ $request->size }}</td>
            <td>{{ $request->breakable }}</td>
            <td>{{ $request->delivery_service }}</td>
            <td>{{ $request->message }}</td>
            <td>{{ $request->total_price }}</td>
            <td>{{ $request->created_at->format('d/m/Y') }}</td>

            <td style="{{ $request->status_id == 4 ? '' : 'display: none;' }}">{{ $request->start_date }}</td>
            <td style="{{ $request->status_id == 4 ? '' : 'display: none;' }}">{{ $request->end_date }}</td>


        </tr>
    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
<x-footer />

<!-- JS هنا -->
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/scrollIt.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>

<!-- Contact js -->
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>

<script src="js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <x-footer />
</body>
</html>
