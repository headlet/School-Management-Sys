@extends('admin.index')

@section('content')
<div class="">

    <!-- Header -->
    <div class="flex justify-between items-center h-14 border border-gray-300 rounded-lg shadow-md px-4 mb-4 bg-white">
        <h2 class="text-lg font-semibold text-gray-800">All Students</h2>

        <div class="flex items-center gap-x-2 text-black">
            <button type="button" class="flex items-center gap-x-2 px-3 py-2 rounded-md bg-gray-200 hover:bg-gray-300 transition btnhe">
                <i class="bi bi-search"></i>
                <span>Search</span>
            </button>
        </div>
    </div>

    <!-- Search Inputs -->
    <div class="flex gap-x-3 justify-end hidden divsear">
        <input type="search" name="search" id="searchBox"
            class="form-control rounded px-2 py-1 text-black w-44"
            placeholder="Search" aria-label="Search Student" aria-describedby="search-addon" />

        <input type="search" name="searchclass" id="searchClassBox"
            class="form-control rounded px-2 py-1 text-black w-44"
            placeholder="Search Class" aria-label="Search Class" aria-describedby="search-addon" />
    </div>

    <!-- Student Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-7 mt-2 ml-3 mr-3 gap-y-2">
        @foreach($student as $students)
        <div id="student-{{ $students->id }}" class="flex flex-col justify-center items-center w-36 h-52 border border-gray-400 rounded-xl shadow-lg p-2 bg-white hover:shadow-xl transition">
            <img src="{{ asset('storage/' . $students->photo) }}" alt="Student Image" class="rounded-full w-24 h-24 mb-2">
            <span class="text-sm text-gray-500">{{ $students->registration }}</span>
            <p class="font-semibold text-gray-800">{{ $students->full_name }}</p>

            <!-- Actions -->
            <div class="flex gap-3 mt-3">
                <a href="{{route('viewstd', $students->id)}}" class="flex items-center justify-center w-8 h-8 bg-blue-500 text-white rounded-full hover:bg-blue-600">
                    <i class="bi bi-eye"></i>
                </a>
                <a href="{{route('editstd', $students->id)}}" class="flex items-center justify-center w-8 h-8 bg-yellow-500 text-white rounded-full hover:bg-yellow-600">
                    <i class="bi bi-pencil"></i>
                </a>
                <a href="#"
                    class="delete-btn flex items-center justify-center w-8 h-8 bg-red-500 text-white rounded-full hover:bg-red-600"
                    data-id="{{ $students->id }}"
                    data-url="{{ route('students.destroy', $students->id) }}">
                    <i class="bi bi-trash"></i>
                </a>
            </div>
        </div>
        @endforeach

        {{-- Add Student Card --}}
        <div class="flex flex-col justify-center items-center w-36 h-52 p-2 border border-dashed border-gray-400 rounded-xl shadow-inner bg-gray-50 hover:bg-gray-100 transition cursor-pointer">
            <a href="{{ route('addstudent') }}" class="inline-flex flex-col justify-center items-center w-36">
                <i class="fas fa-plus text-2xl text-gray-600 mb-2"></i>
                <p class="text-gray-700 font-medium">Add Student</p>
            </a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Toggle search inputs
    $('.btnhe').click(function() {
        $('.divsear').toggleClass('hidden');
    });

    // Delete student via AJAX
    $('.delete-btn').click(function(e) {
        e.preventDefault();

        let id = $(this).data('id');
        let url = $(this).data('url');
        let row = $('#student-' + id);

        Swal.fire({
            title: 'Are you sure?',
            text: "This student will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire(
                                'Deleted!',
                                response.message || 'Student deleted successfully!',
                                'success'
                            ),

                            row.fadeOut(500, () => {
                                $(this).remove;
                            })
                    },
                    error: function(xhr) {

                        Swal.fire('Error!', 'Something went wrong.', 'error');
                        console.error(xhr.responseText);

                    }
                });

            }
        });
    });
</script>
@endsection