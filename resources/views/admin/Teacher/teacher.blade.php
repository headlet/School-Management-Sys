@extends('admin.index')

@section('content')
<div class="px-2 sm:px-0">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0 min-h-14 sm:h-14 border border-gray-300 rounded-lg shadow-md px-3 sm:px-4 py-2 sm:py-0 mb-3 sm:mb-4 bg-white">
        <h2 class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">All Teachers</h2>

        <div class="flex items-center gap-x-2 text-black w-full sm:w-auto">
            <button type="button" class="flex items-center gap-x-2 px-3 py-1.5 sm:py-2 text-xs sm:text-sm md:text-base rounded-md bg-gray-200 hover:bg-gray-300 transition btnhe w-full sm:w-auto justify-center">
                <i class="bi bi-search"></i>
                <span>Search</span>
            </button>
        </div>
    </div>

    <!-- Search Inputs -->
    <div class="flex flex-col sm:flex-row gap-2 sm:gap-x-3 justify-end mb-3 hidden divsear">
        <input type="search" name="search" id="searchBox"
            class="form-control rounded px-3 py-2 text-sm text-black w-full sm:w-44"
            placeholder="Search" aria-label="Search Student" aria-describedby="search-addon" />

        <input type="search" name="searchclass" id="searchClassBox"
            class="form-control rounded px-3 py-2 text-sm text-black w-full sm:w-44"
            placeholder="Search Class" aria-label="Search Class" aria-describedby="search-addon" />
    </div>

    <!-- Student Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-7 gap-2 sm:gap-3">
        @foreach($teachers as $teacher)
        <div id="teacher-{{ $teacher->id }}" class="flex flex-col justify-between items-center w-full min-h-[200px] sm:min-h-[230px] md:h-52 border border-gray-400 rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 bg-white hover:shadow-xl transition">
            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Student Image" class="rounded-full w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 mb-1 sm:mb-2 object-cover flex-shrink-0">

            <div class="flex flex-col items-center w-full flex-grow justify-center">
                <span class="text-[10px] sm:text-xs md:text-sm text-gray-500 truncate w-full text-center px-1">{{ $teacher->phone_number }}</span>
                <p class="font-semibold text-xs sm:text-sm md:text-base text-gray-800 truncate w-full text-center px-1 mt-0.5">{{ $teacher->name }}</p>
            </div>

             <div class="flex flex-col items-center w-full flex-grow justify-center">
                <p class=" text-xs sm:text-sm md:text-base text-gray-800 truncate w-full text-center px-1 mt-0.5">{{ $teacher->Address }}</p>
            </div>
            <!-- Actions -->
            <div class="flex gap-1.5 sm:gap-2 md:gap-3 mt-1.5 sm:mt-2 md:mt-3">
                <a href="{{route('teachershow' , $teacher->id)}}" class="flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">
                    <i class="bi bi-eye text-[10px] sm:text-xs md:text-base"></i>
                </a>
                <a href="{{route('editteacher', $teacher->id)}}" class="flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition">
                    <i class="bi bi-pencil text-[10px] sm:text-xs md:text-base"></i>
                </a>
                <a href="#"
                    class="delete-btn flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-red-500 text-white rounded-full hover:bg-red-600 transition"
                    data-id="{{ $teacher->id }}"
                    data-url="{{route('teacher.destroy', $teacher->id)}}">
                    <i class="bi bi-trash text-[10px] sm:text-xs md:text-base"></i>

                </a>
            </div>
        </div>

        @endforeach

        {{-- Add Teacher Card --}}
        <div class="flex flex-col justify-center items-center w-full min-h-[200px] sm:min-h-[230px] md:h-52 p-2 sm:p-3 border-2 border-dashed border-gray-400 rounded-lg sm:rounded-xl shadow-inner bg-gray-50 hover:bg-gray-100 transition cursor-pointer">
            <a href="{{ route('addteacher') }}" class="inline-flex flex-col justify-center items-center w-full h-full">
                <i class="fas fa-plus text-lg sm:text-xl md:text-2xl text-gray-600 mb-1 sm:mb-2"></i>
                <p class="text-gray-700 font-medium text-xs sm:text-sm md:text-base">Add Teacher</p>
            </a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        toast: true,
        icon: 'success',
        position: 'top-end',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        background: '#4ade80',
        color: 'white',
    });
</script>
@endif
<script>
    // Toggle search inputs
    $('.btnhe').click(function() {
        $('.divsear').toggleClass('hidden');
    });

    $('.delete-btn').click(function(e) {
        e.preventDefault();

        let id = $(this).data('id');
        let url = $(this).data('url');

        let row = $('#teacher-' + id);

        Swal.fire({
            title: 'Are you sure?',
            text: "This Teacher will be permanently deleted!",
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
                            response.message || 'Teacher deleted successfully!',
                            'success'
                        );

                        row.fadeOut(500, function() {
                            $(this).remove();
                        });
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