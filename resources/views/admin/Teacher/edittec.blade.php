@extends('admin.index')

@section('content')
<div class="p-3 sm:p-4 md:p-6">

    <!-- Header -->
    <div class="flex justify-between items-center min-h-14 sm:h-14 border border-gray-300 rounded-lg shadow-md px-3 sm:px-4 py-3 sm:py-0 mb-4 sm:mb-6 bg-white">
        <h2 class="text-base sm:text-lg font-semibold text-gray-800">Edit Teacher</h2>
    </div>

    <!-- Form -->
    <form action="{{ route('updateteacher', $teacher->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6 sm:gap-8 md:gap-10">
        @csrf
        @method('PUT')

        <!-- 1. teacher Information -->
        <div class="border-b-[2px] border-black font-semibold pb-1 text-sm sm:text-base">
            1. Teacher Information
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 md:gap-12">

            <!-- Full Name -->
            <div class="relative w-full">
                <label for="name"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    teacher Name*
                </label>
                <input type="text" id="name" name="name"
                    value="{{ old('name', $teacher->name) }}"
                    placeholder="Name of teacher" 
                    class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">
            </div>

            <!-- Gender -->
            <div class="relative w-full">
                <label for="gender"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    Gender*
                </label>
                <select id="gender" name="gender" 
                    class="w-full h-11 sm:h-12 mt-2 px-4 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base appearance-none bg-white">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $teacher->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $teacher->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $teacher->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>


            <!-- Phone Number -->
            <div class="relative w-full">
                <label for="phone_number"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    Phone Number*
                </label>
                <input type="text" id="phone_number" name="phone_number"
                    value="{{ old('phone_number', $teacher->phone_number) }}" 
                    class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">
            </div>

            <!-- Photo -->
            <div class="relative w-full">
                <label for="photo"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    Photo
                </label>
                <input type="file" id="photo" name="photo"
                    class="w-full h-11 sm:h-12 mt-2 px-4 py-2.5 sm:py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-xs sm:text-sm file:mr-2 file:py-1 file:px-2 file:rounded-full file:border-0 file:text-xs file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">

                @if($teacher->photo)
                <div class="mt-3">
                    <p class="text-xs sm:text-sm text-gray-600 mb-1">Current Photo:</p>
                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="teacher Photo"
                        class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-full border border-gray-300 shadow-sm">
                </div>
                @endif
            </div>

            <!-- Date of Birth -->
            <div class="relative w-full">
                <label for="DOB"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    Date Of Birth*
                </label>
                <input type="date" id="DOB" name="DOB"
                    value="{{ old('DOB', $teacher->DOB) }}" 
                    class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">
            </div>
            <!-- Address -->
            <div class="relative w-full">
                <label for="address"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    Address*
                </label>
                <input type="text" id="address" name="Address" placeholder="Address"
                    value="{{ old('Address', $teacher->Address) }}" 
                    class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">
            </div>

             <!-- Class -->
            <div class="relative w-full">
                <label for="class"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    Class*
                </label>
                <input type="class" id="class" name="class" placeholder="class" value="{{old('class' , $teacher->class)}}" 
                    class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">
            </div>

             <!-- Subject -->
            <div class="relative w-full">
                <label for="subject"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    Subject*
                </label>
                <input type="subject" id="subject" name="subject" placeholder="subject" value="{{old('subject', $teacher->subject)}}" 
                    class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">
            </div>

        </div>

        <!-- 2. Other Information -->
        <!-- <div class="border-b-[2px] border-black font-semibold pb-1 text-sm sm:text-base">
            2. Other Information
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 md:gap-12"> -->


            <!-- Class -->
            <!-- <div class="relative w-full">
                <label for="class"
                    class="absolute -top-2 left-4 bg-gradient-to-r from-blue-500 to-purple-400 text-white text-xs sm:text-sm px-2 rounded-full shadow z-10">
                    Class*
                </label>
                <input type="text" id="class" name="class" placeholder="Class"
                    value="{{ old('class', $teacher->class) }}" 
                    class="w-full h-11 sm:h-12 mt-2 px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all text-sm sm:text-base">
            </div>



        </div> -->

        <!-- Submit Button -->
        <div class="flex justify-center sm:justify-end mt-6 sm:mt-8 md:mt-10">
            <button type="submit"
                class="w-full sm:w-auto px-6 py-2.5 sm:py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-full shadow-md transition-all flex items-center justify-center gap-2 text-sm sm:text-base">
                <i class="bi bi-save"></i> Update teacher
            </button>
        </div>

    </form>

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