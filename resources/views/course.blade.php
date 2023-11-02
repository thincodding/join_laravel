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
            <h1>Insert Course</h1>
            <div class="col-md-4">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif (session('delelete'))
                    <div class="alert alert-success">{{ session('delelete') }}</div>
                @elseif (session("update"))
                    <div class="alert alert-success">{{ session('update') }}</div>
                @endif

                <form method="POST" enctype="multipart/form-data" action="{{ route('InsertCourse') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Course</label>
                        <input type="text" required name="course" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Remark</label>
                        <input type="text" required name="remark" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success mt-3" name="save">Save</button>
                    </div>
                </form>
            </div>

            <div class="col-md-5">
                <table class="table table-bordered mt-3 table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CourseName</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->course_name }}</td>
                                <td>{{ $item->remark }}</td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            {{-- for update --}}
                            <div class="modal fade" id="edit{{ $item->id }}" aria-hidden="true"
                                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('updateCourse', $item->id) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Course</label>
                                                    <input type="text" required value="{{ $item->course_name }}" name="course" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Remark</label>
                                                    <input type="text" required value="{{ $item->remark }}" name="remark" class="form-control">
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
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Delete</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Are you sure delete this course <span
                                                    class="text-danger">{{ $item->course_name }}</span></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('deleteCourse', $item->id) }}"
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
