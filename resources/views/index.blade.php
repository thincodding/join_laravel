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
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <h1>Insert Department</h1>
            <div class="col-md-4">
                <form action="">
                    <div class="form-group">
                        <label for="form-label">Department</label>
                        <input type="text" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form-label">Course</label>
                        <select name="" class="form-control" id="">
                            <option selected disabled>--Select Course--</option>
                            @foreach ($course as $row )
                                <option value="{{ $row->id }}">{{ $row->course_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="form-label">Teacher</label>
                        <select name="" class="form-control" id="">
                            <option selected disabled>--Select Teacher--</option>
                            @foreach ($teacher as $itemRow )
                                <option value="{{ $itemRow->id }}">{{ $itemRow->teacher_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="form-label">Description</label>
                        <input type="text" required class="form-control">
                    </div>
                    <div class="form-group">
                       <button class="btn btn-success mt-2">Save</button>
                    </div>
                </form>
            </div>

            <table class="table table-border border">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Course</th>
                        <th>Teacher</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($department as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->course_name}}</td>
                            <td>{{ $item->teacher_name }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
