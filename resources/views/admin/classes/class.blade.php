@extends('admin.index')

@section('content')
<div  class="px-2 sm:px-0">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0 min-h-14 sm:h-14 border border-gray-300 rounded-lg shadow-md px-3 sm:px-4 py-2 sm:py-0 mb-3 sm:mb-4 bg-white">
        <h2 class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">All Classes</h2>

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

    <!-- class Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-7 gap-2 sm:gap-3">
      @foreach($classes as $class)
        <div id="class- $classes->id " class="flex flex-col justify-between items-center w-full min-h-[100px] sm:min-h-[150px] md:h-10 border border-gray-400 rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 bg-white hover:shadow-xl transition">
            <div class="flex flex-col items-center w-full flex-grow justify-center">
                <span class="text-[10px] text-xl font-bold text-gray-500 truncate w-full text-center px-1">Class:{{$class->class}} </span>
            </div>

            <!-- Actions -->
            <div class="flex gap-1.5 sm:gap-2 md:gap-3 mt-1.5 sm:mt-2 md:mt-3">
                <a href="{{route('section', $class->class)}}" class="flex items-center justify-center  w-fit p-2 h-8 rounded-xl bg-blue-500 text-white hover:bg-blue-600 transition">
                    <i class="bi bi-eye text-[10px] sm:text-xs md:text-base">View More</i>
                </a>
            </div>
        </div>
        @endforeach
   

       
        <div class="flex flex-col justify-center items-center w-full min-h-[100px] sm:min-h-[150px] md:h-10 p-2 sm:p-3 border-2 border-dashed border-gray-400 rounded-lg sm:rounded-xl shadow-inner bg-gray-50 hover:bg-gray-100 transition cursor-pointer">
            <a href=" {{route('newclass')}} " class="inline-flex flex-col justify-center items-center w-full h-full">
                <i class="fas fa-plus text-lg sm:text-xl md:text-2xl text-gray-600 mb-1 sm:mb-2"></i>
                <p class="text-gray-700 font-medium text-xs sm:text-sm md:text-base">Add New</p>
            </a>
        </div>
    </div>
</div>


@if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#4ade80',
            color: '#fff',
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: 'Validation Failed!',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            background: '#f87171',
            color: '#fff',
        });
    </script>
@endif
@endsection