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
        
        .table td, .table th {
            vertical-align: middle; 
            text-align: center;
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

<h2 class="mb-4">My Requests</h2>
@if($inventoryRequests->isEmpty())
    <div class="alert alert-warning">You have no current requests.</div>
@else
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped table-sm">
            <thead class="thead-light">
                <tr>
                    <th style="padding: 10px; vertical-align: middle;">Request ID</th>
                    <th style="padding: 10px; vertical-align: middle;">Housing Details</th>
                    <th style="padding: 10px; vertical-align: middle;">Status</th>
                    <th style="padding: 10px; vertical-align: middle;">Size</th>
                    <th style="padding: 10px; vertical-align: middle;">Breakable</th>
                    <th style="padding: 10px; vertical-align: middle;">Requested Service</th>
                    <th style="padding: 10px; vertical-align: middle;">Message</th>
                    <th style="padding: 10px; vertical-align: middle;">Total Price</th>
                    <th style="padding: 10px; vertical-align: middle;">Request Date</th>
                    <th class="d-none d-md-table-cell" style="padding: 10px; vertical-align: middle;">Start Date</th>
                    <th class="d-none d-md-table-cell" style="padding: 10px; vertical-align: middle;">End Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventoryRequests as $request)
                    <tr>
                        <td style="vertical-align: middle;">{{ $request->id }}</td>
                        <td style="vertical-align: middle;">{{ $request->housing_details }}</td>
                        <td style="vertical-align: middle;">
                            @if ($request->status_id == 1)
                                <span class="badge badge-warning">Pending</span>
                            @elseif ($request->status_id == 2)
                                <span class="badge badge-primary">In Progress</span>
                            @elseif ($request->status_id == 3)
                                <span class="badge badge-danger">Rejected</span>
                            @elseif ($request->status_id == 4)
                                <span class="badge badge-success">Accepted</span>
                            @else
                                <span class="badge badge-secondary">Unknown Status</span>
                            @endif
                        </td>
                        <td style="vertical-align: middle;">{{ $request->size }}</td>
                        <td style="vertical-align: middle;">{{ $request->breakable }}</td>
                        <td style="vertical-align: middle;">{{ $request->delivery_service }}</td>
                        <td style="vertical-align: middle;">{{ $request->message }}</td>
                        <td style="vertical-align: middle;">{{ $request->total_price }}</td>
                        <td style="vertical-align: middle;">{{ $request->created_at->format('d/m/Y') }}</td>
                        <td class="d-none d-md-table-cell" style="vertical-align: middle;">{{ $request->start_date }}</td>
                        <td class="d-none d-md-table-cell" style="vertical-align: middle;">{{ $request->end_date }}</td>
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
