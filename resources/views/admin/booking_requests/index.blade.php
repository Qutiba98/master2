<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #343a40;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #191C24;
        }

        tr:hover {
            background-color: #6d6868;
        }

        .btn {
            margin: 2px;
        }

        .text-success {
            font-weight: bold;
        }
     
        .text-danger {
            font-weight: bold;
        }
    </style>
</head>
<body>
    @include('layout.dash')

<div class="container mt-5">
    <h2>Booking Requests</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Package Type</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($requests->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">No booking requests available</td>
                </tr>
            @else
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->packageType->name }}</td>
                        <td>{{ $request->duration }}</td>
                        <td>{{ $request->price }}</td>
                        <td class="{{ $request->status == 'accepted' ? 'text-success' : ($request->status == 'rejected' ? 'text-danger' : '') }}">
                            {{ ucfirst($request->status) }}
                        </td>
                        <td>
                            @if ($request->status === 'pending')
                                <form action="{{ route('admin.booking.requests.accept', $request->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                                <form action="{{ route('admin.booking.requests.reject', $request->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @elseif ($request->status === 'accepted')
                                <span class="text-success">Accepted</span>
                                <form action="{{ route('admin.booking.requests.reject', $request->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @elseif ($request->status === 'rejected')
                                <span class="text-danger">Rejected</span>
                                <form action="{{ route('admin.booking.requests.accept', $request->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                            @endif
                        </td>
                    </tr> 
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
