@extends('admin.index')
@section('content')
<section>
    <form action="" method="post">
        @csrf
        <div>
            <label for="class">Class:</label>
            <input type="text" name="class" id="class" placeholder="Add a class">
        </div>
        <div>
            <label for="section">Section:</label>
            <input type="text" name="Section" placeholder="Add section">
        </div>
    </form>
</section>
@endsection