@extends('admin.index')

@section('content')

<div class="container mx-auto p-4">

    <div class="flex flex-col md:flex-row justify-between items-center h-auto md:h-14 border border-gray-300 rounded-lg shadow-md px-4 mb-4 bg-white gap-3 md:gap-0">
        <h2 class="text-lg font-semibold text-gray-800 text-center md:text-left">View Teachers | Report</h2>

        <div class="flex flex-wrap justify-center items-center gap-2">

            <a href="{{route('teacher')}}" class="flex items-center gap-x-2 px-3 py-2 rounded-md bg-blue-400 hover:bg-gray-300 transition btnhe">
                Back
            </a>

            <a href="{{route('editteacher', $teacher->id)}}" class="flex items-center gap-x-2 px-3 py-2 rounded-md bg-red-400 hover:bg-gray-300 transition btnhe">
                <span>Edit</span>
            </a>

            <button type="button" class="flex items-center py-2 px-3 rounded-md bg-green-400 hover:bg-gray-300 transition btnhe">
                <span>GET PDF</span>
            </button>

        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

        <!-- Left: Student Info -->
        <div class="bg-white p-6 rounded-lg shadow w-full">
            <div class="flex flex-col items-center">
                <img src="{{asset('storage/'. $teacher->photo)}}" alt="Profile" class="rounded-full mb-3 w-32 h-32 object-cover">
                <h3 class="text-purple-600 text-xl font-semibold text-center">{{$teacher->name}}</h3>
            </div>

            <div class="mt-4 text-gray-600 space-y-2 text-sm w-full break-words">
                <p><span class="font-semibold">Date of Birth:</span> {{$teacher->DOB}}</p>
                <p><span class="font-semibold">Gender:</span> {{$teacher->gender}}</p>
                <p><span class="font-semibold">Phone Number:</span> {{$teacher->phone_number}}</p>
                <p><span class="font-semibold">Address:</span> {{$teacher->Address}}</p>
            </div>
        </div>

        <!-- Middle Column -->
        <div class="col-span-1 lg:col-span-2 space-y-6 w-full">

            <!-- Attendance Report -->
            <div class="bg-white p-6 rounded-lg shadow w-full">
                <h4 class="text-purple-600 font-semibold mb-4">1. Attendance Report</h4>
                <div class="flex flex-wrap justify-around mb-4 gap-4">
                    <div class="text-center">
                        <div class="rounded-full w-20 h-20 border-4 border-pink-300 flex items-center justify-center text-pink-600 font-bold text-lg">0%</div>
                        <p class="text-gray-500 mt-2">Overall</p>
                        <span class="badge bg-secondary mt-1">Today: NOT MARKED</span>
                    </div>
                    <div class="text-center">
                        <div class="rounded-full w-20 h-20 border-4 border-pink-300 flex items-center justify-center text-pink-600 font-bold text-lg">0%</div>
                        <p class="text-gray-500 mt-2">Oct 2025</p>
                        <span class="badge bg-secondary mt-1">Yesterday: NOT MARKED</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-around mt-4 gap-3">
                    <div class="text-center bg-blue-100 p-3 rounded-lg w-24">
                        <p class="text-blue-600 font-semibold">PRESENTS</p>
                        <p class="text-gray-700">0</p>
                    </div>
                    <div class="text-center bg-purple-100 p-3 rounded-lg w-24">
                        <p class="text-purple-600 font-semibold">LEAVES</p>
                        <p class="text-gray-700">0</p>
                    </div>
                    <div class="text-center bg-pink-100 p-3 rounded-lg w-24">
                        <p class="text-pink-600 font-semibold">ABSENTS</p>
                        <p class="text-gray-700">0</p>
                    </div>
                </div>
            </div>

            <!-- Class Tests Report -->
            <div class="bg-white p-6 rounded-lg shadow w-full h-auto">
                <h4 class="text-purple-600 font-semibold mb-4">2. Class Tests Report</h4>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-purple-600 h-4 rounded-full w-0"></div>
                </div>
            </div>

            <!-- Fee Report -->
            <div class="bg-white p-6 rounded-lg shadow w-full">
                <h4 class="text-purple-600 font-semibold mb-4">4. Fee Report</h4>
                <div class="flex justify-center items-center h-32 text-gray-400">
                    <p>No Record Found.</p>
                </div>
            </div>

        </div>

        <!-- Examination Report -->
        <div class="bg-white p-6 rounded-lg shadow w-full">
            <h4 class="text-purple-600 font-semibold mb-4">3. Examination Report</h4>
            <div class="flex justify-center items-center h-32 text-gray-400">
                <p>No Record Found.</p>
            </div>
        </div>

    </div>

</div>

@endsection