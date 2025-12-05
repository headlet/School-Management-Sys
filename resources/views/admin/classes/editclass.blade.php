@extends('admin.index')
@section('content')
<section class="flex flex-col items-center justify-center">
    <div class="w-full flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0 min-h-14 sm:h-14 border border-gray-300 rounded-lg shadow-md px-3 sm:px-4 py-3 sm:py-0 mb-4 sm:mb-6 bg-white">
        <h2 class="text-base sm:text-lg font-semibold text-gray-800">Edit class</h2>

    </div>
    <form action="{{route('class_upate', $classes->id)}}" method="post" class="grid grid-cols-1  gap-6 sm:gap-8 md:gap-12 border  m-3 p-4 w-fit rounded-xl shadow-blue-400 shadow-2xl">
        @csrf
        @method('PUT')
        <div class="relative w-[20vw]">
            <label for="class" class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">Class:</label>
            <input type="text" name="Class" id="class" value="{{old('Class', $classes->Class)}}" placeholder="Add a class" class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">
        </div>
        <div class="relative w-[20vw]">
            <label for="section" class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">Section:</label>
            <input type="text" name="Section" value="{{old('Section', $classes->Section)}}" placeholder="Add section" class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">

        </div>
        <button type="submit" class="bg-blue-400 p-2 rounded-xl text-lg font-normal">Update</button>
    </form>

    
</section>
@endsection