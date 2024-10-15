<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
</head>

<style>
    .container{
    
    }
    /* Ensure the card and table stretch 100% width */
    .card {
        width: 100%;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        table-layout: auto;
    }
    table th, table td {
        white-space: nowrap;
    }
    /* Specific column width for ID and Actions */
    table th:nth-child(1), table td:nth-child(1) {
        width: 5%;
    }
    table th:nth-child(7), table td:nth-child(7) {
        width: 20%;
    }
    /* Allow wrapping for longer text */
    table th:nth-child(3), table td:nth-child(3),
    table th:nth-child(5), table td:nth-child(5) {
        white-space: normal;
        word-wrap: break-word;
    }

    /* MEDIA QUERIES FOR RESPONSIVENESS */
    @media (max-width: 1200px) {
        table th:nth-child(5), table td:nth-child(5) { /* Hide Address on smaller screens */
            display: none;
        }
    }

    @media (max-width: 992px) {
        table th:nth-child(1), table td:nth-child(1) { /* Hide ID on medium screens */
            display: none;
        }
    }

    @media (max-width: 768px) {
        table th, table td {
            white-space: normal;
            word-wrap: break-word;
        }
        table th:nth-child(6), table td:nth-child(6), /* Hide Status */
        table th:nth-child(7), table td:nth-child(7) { /* Hide Actions */
            display: none;
        }
    }

    @media (max-width: 576px) {
        .card-header {
            font-size: 1.2rem; /* Smaller header font on mobile */
        }
        table, table thead, table tbody, table th, table td, table tr {
            display: block; /* Mobile-friendly stacked layout */
        }
        table thead tr {
            display: none; /* Hide table headers on mobile */
        }
        table td {
            position: relative;
            padding-left: 50%;
            text-align: right;
        }
        table td:before {
            content: attr(data-label); /* Add labels to the left of each cell */
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 10px;
            font-weight: bold;
            text-align: left;
        }
    }
</style>

<body>

    @include('layout.dash')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">List of Users</div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td data-label="ID">{{ $user->id }}</td>
                                    <td data-label="Name">{{ $user->name }}</td>
                                    <td data-label="Email">{{ $user->email }}</td>
                                    <td data-label="Phone Number">{{ $user->number }}</td>
                                    <td data-label="Address"  style="line-height: 1.3rem">{{ $user->address }}</td>
                                    <td data-label="Status">
                                        @if($user->deleted_at)
                                            <span class="text-danger">Deleted</span>
                                        @else
                                            <span class="text-success">Active</span>
                                        @endif
                                    </td>
                                    <td data-label="Actions">
                                        @if(!$user->deleted_at)
                                            <a href="{{ route('admin.edituser', $user->id) }}" class="btn btn-outline-secondary btn-icon-text">
                                                Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                                            </a>
                                            <a href="{{ route('admin.softdeleteuser', $user->id) }}" class="btn btn-outline-warning btn-icon-text">
                                                Soft Delete <i class="mdi mdi-delete btn-icon-append"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.restoreuser', $user->id) }}" class="btn btn-outline-success btn-icon-text">
                                                Restore <i class="mdi mdi-recycle btn-icon-append"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td data-label="Role">
                                        @switch($user->role_id)
                                            @case(1)
                                                User
                                                @break
                                            @case(2)
                                                Admin
                                                @break
                                            @case(3)
                                                Super Admin
                                                @break
                                            @default
                                                Unknown
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
