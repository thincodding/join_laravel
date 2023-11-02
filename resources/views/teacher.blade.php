@extends('boostrap');

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('saveDepart') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('course') }}">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher') }}">Teacher</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif (session('delete'))
                    <div class="alert alert-success">{{ session('delete') }}</div>
                @elseif (session('edit'))
                    <div class="alert alert-success">{{ session('edit') }}</div>
                @endif

                <form method="POST" enctype="multipart/form-data" action="{{ route('saveTeacher') }}">
                    @csrf
                    <div class="form-group">
                        <label for="form-label">Teacher</label>
                        <input type="text" required name="teacher" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form-label">Phone</label>
                        <input type="text" required name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form-label">Email</label>
                        <input type="text" required name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success mt-2">Save</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered table-striped mt-4">
                    <thead>

                        <tr>
                            <th>Id</th>
                            <th>Teacher</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($teachers as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->teacher_name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>

                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                                        class="btn btn-primary">Edit</button>
                                    <button data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                                        class="btn btn-danger">delete</button>
                                </td>
                            </tr>

                            {{-- //for edit --}}

                            <div class="modal fade" id="edit{{ $item->id }}" aria-hidden="true"
                                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('updateTeacher', $item->id) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="form-label">Teacher</label>
                                                    <input type="text" value="{{ $item->teacher_name }}" required name="teacher" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="form-label">Phone</label>
                                                    <input type="text" required value="{{ $item->phone }}" name="phone" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="form-label">Email</label>
                                                    <input type="text" required value="{{ $item->email }}" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- //for delete --}}
                            <div class="modal fade" id="delete{{ $item->id }}" aria-hidden="true"
                                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Are you sure delete name <span
                                                    class="text-danger">{{ $item->teacher_name }}</span></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('deleteTeacher', $item->id) }}"
                                                class="btn btn-danger">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
