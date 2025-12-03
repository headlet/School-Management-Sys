@extends('admin.index')
@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <form class="d-flex ms-auto" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </nav>

    <!-- Dashboard cards -->
    <div class="row g-4">
      <div class="col-md-2">
        <div class="card text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title">Students</h5>
            <p class="card-text fs-4">{{$student}}</p>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card text-white bg-success">
          <div class="card-body">
            <h5 class="card-title">Total Teachers</h5>
            <p class="card-text fs-4">{{$teacher}}</p>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card text-white bg-warning">
          <div class="card-body">
            <h5 class="card-title">Classes</h5>
            <p class="card-text fs-4">0</p>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card text-white bg-purple-600">
          <div class="card-body">
            <h5 class="card-title">Attendance</h5>
            <p class="card-text fs-4">0</p>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">Total Revenue</h5>
            <p class="card-text fs-4">23</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content section -->
    <div class="mt-4">
      <h4>Recent Activity</h4>
      <table class="table table-striped mt-2">
        <thead>
          <tr>
            <th>User</th>
            <th>Action</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John Doe</td>
            <td>Added a new product</td>
            <td>2025-10-04</td>
          </tr>
          <tr>
            <td>Jane Smith</td>
            <td>Updated settings</td>
            <td>2025-10-03</td>
          </tr>
          <tr>
            <td>Mike Brown</td>
            <td>Deleted a user</td>
            <td>2025-10-02</td>
          </tr>
        </tbody>
      </table>
    </div>

@endsection