<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trashed Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
</head>

<style>
    .container{
        /* يمكنك إضافة تعديلات أخرى على الحاوية هنا إذا كنت بحاجة لذلك */
    }
    /* نفس الستايل المعتمد */
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
    table th:nth-child(1), table td:nth-child(1) {
        width: 5%;
    }
    table th:nth-child(6), table td:nth-child(6) {
        width: 20%;
    }
    table th:nth-child(3), table td:nth-child(3),
    table th:nth-child(5), table td:nth-child(5) {
        white-space: normal;
        word-wrap: break-word;
    }

    @media (max-width: 1200px) {
        table th:nth-child(5), table td:nth-child(5) {
            display: none;
        }
    }

    @media (max-width: 992px) {
        table th:nth-child(1), table td:nth-child(1) {
            display: none;
        }
    }

    @media (max-width: 768px) {
        table th, table td {
            white-space: normal;
            word-wrap: break-word;
        }
        table th:nth-child(6), table td:nth-child(6) {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .card-header {
            font-size: 1.2rem;
        }
        table, table thead, table tbody, table th, table td, table tr {
            display: block;
        }
        table thead tr {
            display: none;
        }
        table td {
            position: relative;
            padding-left: 50%;
            text-align: right;
        }
        table td:before {
            content: attr(data-label);
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
        <h2 class="mb-4">Trashed Users</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">List of Trashed Users</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td data-label="ID">{{ $user->id }}</td>
                                    <td data-label="Name">{{ $user->name }}</td>
                                    <td data-label="Email">{{ $user->email }}</td>
                                    <td data-label="Phone Number">{{ $user->number }}</td>
                                    <td data-label="Address">{{ $user->address }}</td>
                                    <td data-label="Actions">
                                        <a href="{{ route('admin.restoreuser', $user->id) }}" class="btn btn-outline-success btn-icon-text">
                                            Restore <i class="mdi mdi-recycle btn-icon-append"></i>
                                        </a>
                                        <a href="{{ route('admin.forceDeleteUser', $user->id) }}" class="btn btn-outline-danger btn-icon-text">
                                            Permanently Delete <i class="mdi mdi-delete btn-icon-append"></i>
                                        </a>
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
