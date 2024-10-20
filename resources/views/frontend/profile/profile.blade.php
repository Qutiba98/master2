<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <style>
        /* تأكد من أن النص في كل الأعمدة متساوي في المحاذاة */
        .table td, .table th {
            vertical-align: middle; /* لضبط العمود في المنتصف */
            text-align: center; /* لمحاذاة النص إلى المنتصف */
        }
    </style>
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
            <div class="card-header" style="color: black">User Information</div>
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
                <table class="table table-bordered table-striped table-sm">
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
                            <th class="d-none d-md-table-cell">Start Date</th>
                            <th class="d-none d-md-table-cell">End Date</th>
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
                                <td class="d-none d-md-table-cell">{{ $request->start_date }}</td>
                                <td class="d-none d-md-table-cell">{{ $request->end_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <x-footer />
</body>
</html>
