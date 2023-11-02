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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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
            <h1>Insert Department</h1>
            <div class="col-md-4">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @elseif (session('edit'))
                    <div class="alert alert-success">
                        {{ session('edit') }}
                    </div>
                    @elseif (session('delete'))
                    <div class="alert alert-success">
                        {{ session('delete') }}
                    </div>
                @endif

                <form action="{{ route('saveDepart') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="form-label">Department</label>
                        <input type="text" name="department" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form-label">Course</label>
                        <select name="course" class="form-control" id="">
                            <option selected disabled>--Select Course--</option>
                            @foreach ($course as $row)
                                <option value="{{ $row->id }}">{{ $row->course_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="form-label">Teacher</label>
                        <select name="teacher" class="form-control" id="">
                            <option selected disabled>--Select Teacher--</option>
                            @foreach ($teacher as $itemRow)
                                <option value="{{ $itemRow->id }}">{{ $itemRow->teacher_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="form-label">Description</label>
                        <input type="text" name="description" required class="form-control">
                    </div>
                    <div class="form-group">
                        <button name="save" class="btn btn-success mt-2">Save</button>
                    </div>
                </form>
            </div>

            <table class="table table-border border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Course</th>
                        <th>Teacher</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($department as $item)
                        <tr>
                            {{-- <td>{{ $item->id }}</td> --}}
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item->teacher_name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $item->id }}">Edit</button>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $item->id }}">Delete</button>

                            </td>
                        </tr>
                        <!--delete modal -->

                        <div class="modal fade" id="delete{{ $item->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Deleted!</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Do you want to delete this name <span class="text-danger">{{ $item->name }}</span> </h4>
                                </div>
                                <div class="modal-footer">
                                 <a href="{{ route('deleteDepart', $item->id) }}" class="btn btn-danger">Yes</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- Edit -->
                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('editDepart', $item->id) }}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="form-label">Department</label>
                                                <input type="text" value="{{ $item->name }}" name="department" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Course</label>
                                                <select name="course" class="form-control" id="">
                                                    <option selected disabled value="">{{ $item->course_name }}</option>
                                                    @foreach ($course as $row)
                                                        <option value="{{ $row->id }}">{{ $row->course_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Teacher</label>
                                                <select name="teacher" class="form-control" id="">
                                                    <option selected disabled value="">{{ $item->teacher_name }}</option>
                                                    @foreach ($teacher as $itemRow)
                                                        <option value="{{ $itemRow->id }}">
                                                            {{ $itemRow->teacher_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Description</label>
                                                <input type="text" name="description" value="{{ $item->description }}" required
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button name="update" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
