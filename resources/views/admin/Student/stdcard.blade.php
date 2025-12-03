@extends('admin.index')
@section('content')
<section>
    <!-- Header -->
    <div
        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0 min-h-14 sm:h-14 border border-gray-300 rounded-lg shadow-md px-3 sm:px-4 py-2 sm:py-0 mb-3 sm:mb-4 bg-white">
        <h2 class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">All Students Cards</h2>

        <div class="flex items-center gap-x-2 text-black w-full sm:w-auto">
            <button type="button"
                class="flex items-center gap-x-2 px-3 py-1.5 sm:py-2 text-xs sm:text-sm md:text-base rounded-md bg-gray-200 hover:bg-gray-300 transition btnhe w-full sm:w-auto justify-center">
                <i class="bi bi-search"></i>
                <span>Search</span>
            </button>
        </div>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($carddetails as $carddetail)
        <div class="w-full sm:w-72 flex flex-col items-center rounded-2xl shadow-2xl overflow-hidden">
            <!-- Card Top -->
            <div class="w-full bg-[url('{{asset('/image/idimag.png')}}')] bg-cover flex flex-col items-center rounded-t-2xl gap-2">
                <h2 class="pt-4 text-white text-xl sm:text-2xl font-bold text-center">School Management System</h2>

                <img src="{{ asset('/storage/' . $carddetail->photo) }}" alt=""
                    class="w-20 h-20 sm:w-28 sm:h-28 rounded-full border-2 border-white">
            </div>

            <!-- Card Details -->
            <div class="w-full px-4 py-2 mt-2 text-gray-800">
                <h2 class="text-xl sm:text-2xl font-bold pb-1 text-center">{{$carddetail->full_name}}</h2>
                <p class="text-sm sm:text-base">Registration: <span>{{$carddetail->registration}}</span></p>
                <p class="text-sm sm:text-base">Class: <span>{{$carddetail->class}}</span></p>
                <p class="text-sm sm:text-base">Father's Name: <span>{{$carddetail->father_name ?? ''}}</span></p>
                <p class="text-sm sm:text-base">Phone no: <span>{{$carddetail->phone_number}}</span></p>
                <p class="text-sm sm:text-base">Address: <span>{{$carddetail->address}}</span></p>
            </div>

            <!-- Card Footer -->
            <div class="w-full h-7 text-white text-center text-xs sm:text-sm rounded-t-md rounded-b-2xl bg-[url('{{asset('/image/idbtm.png')}}')] mt-1 flex items-center justify-center">
                If found please, return it to the school
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
