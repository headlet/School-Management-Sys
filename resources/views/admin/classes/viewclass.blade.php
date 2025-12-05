@extends("admin.index")
@section('content')
<section>
    <div class="w-full flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0 min-h-14 sm:h-14 border border-gray-300 rounded-lg shadow-md px-3 sm:px-4 py-3 sm:py-0 mb-4 sm:mb-6 bg-white">
        <h2 class="text-base sm:text-lg font-semibold text-gray-800">Class {{$class}}</h2>

    </div>
    
     <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-7 gap-2 sm:gap-3">
        @foreach($section as $sections)
        <div id="class- $classes->id " class="flex flex-col justify-between items-center w-full min-h-[100px] sm:min-h-[150px] md:h-10 border border-gray-400 rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 bg-white hover:shadow-xl transition">
            <div class="flex flex-col items-center w-full flex-grow justify-center">
                <span class="text-[10px] text-xl font-bold text-gray-500 truncate w-full text-center px-1">Section:{{$sections->Section}} </span>
            </div>

            <!-- Actions -->
            <div class="flex gap-1.5 sm:gap-2 md:gap-3 mt-1.5 sm:mt-2 md:mt-3">
                <a href="route('section', $class->class)" class="flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">
                    <i class="bi bi-eye text-[10px] sm:text-xs md:text-base"></i>
                </a>
                <a href="route('editstd', $classes->id)" class="flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition">
                    <i class="bi bi-pencil text-[10px] sm:text-xs md:text-base"></i>
                </a>
                <a href="#"
                    class="delete-btn flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-red-500 text-white rounded-full hover:bg-red-600 transition"
                    data-id=" $classes->id "
                    data-url=" route('classes.destroy', $classes->id) ">
                    <i class="bi bi-trash text-[10px] sm:text-xs md:text-base"></i>
                </a>
            </div>
        </div>
        @endforeach
   
</section>
@endsection