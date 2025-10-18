@extends('admin.index')

@section('content')
<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center h-14 border border-gray-300 rounded-lg shadow-md px-4 mb-6 bg-white">
        <h2 class="text-lg font-semibold text-gray-800">Add a Student</h2>

        <button type="button" class="flex items-center gap-x-2 px-3 py-2 rounded-md bg-gray-200 hover:bg-gray-300 transition">
            <i class="bi bi-search"></i>
            <span>Import Student</span>
        </button>
    </div>

    <!-- Form -->
    <form action="{{route('studentstore')}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-10">
        @csrf

        <!-- 1. Student Information -->
        <div class="border-b-[2px] border-black font-semibold pb-1">
            1. Student Information
        </div>

        <div class="grid grid-cols-3 gap-12">

            <!-- Full Name -->
            <div class="relative w-96">
                <label for="full_name"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Student Name*
                </label>
                <input type="text" id="full_name" name="full_name" value="{{old('full_name')}}" placeholder="Name of student" required
                    class="w-full h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

            <!-- Registration -->
            <div class="relative w-96">
                <label for="registration"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Registration No.*
                </label>
                <input type="text" id="registration" name="registration" value="{{old('registration')}}" required
                    class="w-full h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

            <!-- Phone Number -->
            <div class="relative w-96">
                <label for="phone_number"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Phone Number*
                </label>
                <input type="text" id="phone_number" name="phone_number" value="{{old('phone_number')}}" required
                    class="w-full h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

            <!-- Photo -->
            <div class="relative w-96">
                <label for="photo"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Photo*
                </label>
                <input type="file" id="photo" name="photo" required
                    class="w-full h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

            <!-- Date of Birth -->
            <div class="relative w-96">
                <label for="dob"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Date Of Birth*
                </label>
                <input type="date" id="dob" name="dob" value="{{old('dob')}}" required
                    class="w-full h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

            <!-- Date of Admission -->
            <div class="relative w-96">
                <label for="doa"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Date Of Admission*
                </label>
                <input type="date" id="doa" name="doa" value="{{old('doa')}}" required
                    class="w-full h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

        </div>

        <!-- 2. Other Information -->
        <div class="border-b-[2px] border-black font-semibold pb-1">
            2. Other Information
        </div>

        <div class="grid grid-cols-3 gap-12">

            <!-- Gender -->
            <div class="relative w-96">
                <label for="gender"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Gender*
                </label>
                <select id="gender" name="gender" required
                    class="w-full h-12 px-4 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>



            <!-- Class -->
            <div class="relative w-96">
                <label for="class"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Class*
                </label>
                <input type="text" id="class" name="class" placeholder="Class" value="{{old('class')}}" required
                    class="w-full h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

            <!-- Address -->
            <div class="relative w-96">
                <label for="address"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-sm px-2 rounded-full shadow">
                    Address*
                </label>
                <input type="text" id="address" name="address" placeholder="Address" value="{{old('address')}}" required
                    class="w-full h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-10">
            <button type="submit" class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-full shadow-md transition-all flex items-center gap-2">
                <i class="bi bi-save"></i> Save Student
            </button>
        </div>

    </form>

</div>


@if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end', // 👈 top-right corner
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#4ade80', // green-ish
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
            background: '#f87171', // red-ish
            color: '#fff',
        });
    </script>
@endif



@endsection