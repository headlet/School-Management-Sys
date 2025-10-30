@extends('layout.public.main')

@section('content')
<div class="bg-blue-700 min-h-screen flex justify-center items-center px-4 ">

    <section class="flex flex-col md:flex-row justify-center items-center gap-0 mt-28">

        <!-- Image Side -->
        <div class="md:h-[550px] w-full md:w-[30vw] bg-no-repeat rounded-l-xl bg-contain bg-center  bg-white shadow-xl p-10 bg-[url('{{ asset('image/Login.png') }}')]">
        </div>

        <!-- Register Card -->
        <div class="shadow-xl p-10  bg-white  flex flex-col justify-center items-center gap-4  rounded-r-xl text-black  md:h-[550px] w-full md:w-[35vw]">
            <h2 class="text-center text-2xl font-bold mb-2 text-gray-700">Register</h2>
            <p class="text-gray-500 text-sm mb-6 text-center">Create your account to get started</p>


            <form action="{{route('signup')}}" method="POST" class="w-full space-y-4" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <!-- Full Name -->
                    <div>
                        <label class="text-gray-600 font-medium">Full Name</label>
                        <input type="text" name="name" required
                            class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-gray-600 font-medium">Email</label>
                        <input type="email" name="email" required
                            class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label class="text-gray-600 font-medium">Phone Number</label>
                        <input type="text" name="phone_number" required
                            class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Password -->
                    <div>

                        <label class="text-gray-600 font-medium">Password</label>
                        <input type="password" name="password" required
                            class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="text-gray-600 font-medium">Confirm Password</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Profile Photo -->
                    <div>
                        <label class="text-gray-600 font-medium">Profile Photo</label>
                        <input type="file" name="photo" accept="image/*"
                            class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>


                <!-- Submit -->
                <button type="submit"
                    class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
                    Register
                </button>

                <!-- Login Link -->
                <p class="text-center text-gray-600 text-sm mt-4">
                    Already have an account?
                    <a href="{{route('login')}}" class="text-blue-600 hover:underline font-medium">Login</a>
                </p>
            </form>
        </div>



    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
s

@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: `
            <ul style="text-align: left; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
        confirmButtonText: 'OK'
    });
</script>
@endif



@endsection