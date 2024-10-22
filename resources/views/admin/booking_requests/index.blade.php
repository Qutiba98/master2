<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: white;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
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
            background: #191C24;
            color: white;
        }

        th {
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #191C24;
        }

        tr:hover {
            background-color: #ffffff;
            color: white;
        }

        .btn-accept {
            background-color: #28a745; /* Green */
            color: white;
        }

        .btn-reject {
            background-color: #dc3545; /* Red */
            color: white;
        }

        .status-accepted {
            color: #28a745; /* Green */
            font-weight: bold;
        }

        .status-rejected {
            color: #dc3545; /* Red */
            font-weight: bold;
        }

        .btn {
            margin-left: 5px;
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.5rem;
            }

            .table thead {
                display: none; /* Hide the header on small screens */
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block; /* Make each row a block */
                width: 100%; /* Full width */
            }

            .table td {
                text-align: right; /* Align text to the right */
                position: relative; /* Position relative for pseudo-element */
                padding-left: 50%; /* Leave space for labels */
            }

            .table td::before {
                content: attr(data-label); /* Show the label before each value */
                position: absolute; /* Position it */
                left: 10px; /* Space from left */
                width: calc(50% - 20px); /* Adjust width */
                text-align: left; /* Align to the left */
                font-weight: bold; /* Bold the label */
            }
        }
    </style>
</head>
<body>

@include('layout.dash')

<div class="container mt-5">
    <h2 class="mb-4">Booking Requests</h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
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
                        <td data-label="User Name">{{ $request->user->name }}</td>
                        <td data-label="Package Type">{{ $request->packageType->name }}</td>
                        <td data-label="Duration">{{ $request->duration }}</td>
                        <td data-label="Price">{{ $request->price }}</td>
                        <td data-label="Status" class="{{ $request->status == 'Accepted' ? 'status-accepted' : ($request->status == 'Rejected' ? 'status-rejected' : '') }}">
                            {{ $request->status }}
                        </td>
                        <td data-label="Actions">
                            <form action="{{ route('admin.booking.requests.accept', $request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                            <form action="{{ route('admin.booking.requests.reject', $request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
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
