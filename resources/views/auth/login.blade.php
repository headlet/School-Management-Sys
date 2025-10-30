@extends('layout.public.main')

@section('content')
<div class="bg-blue-700 min-h-screen flex justify-center items-center px-4">
    <section class="flex flex-col md:flex-row justify-center items-center gap-0 mt-28">

        <!-- Login Card -->
        <div class="shadow-xl p-10 w-full md:w-[30vw] bg-white h-[550px] flex flex-col justify-center items-center gap-4 rounded-l-xl text-black">
            <h2 class="text-center text-2xl font-bold mb-2 text-gray-700">Login Portal</h2>
            <p class="text-gray-500 text-sm mb-6 text-center">Select your role and sign in to your account</p>

            <form action="{{route('signin')}}" method="POST" class="w-full space-y-4">
                @csrf

                <!-- Role Selection (Styled Radio Buttons) -->
                <div class="flex justify-between mb-5 gap-2">
                    <label class="cursor-pointer w-1/3 text-center">
                        <input type="radio" name="role" value="admin" class="hidden peer" required>
                        <div class="px-4 py-2 rounded-md border border-gray-300 font-semibold text-gray-700 
                        peer-checked:bg-blue-600 peer-checked:text-white transition duration-200">
                            Admin
                        </div>
                    </label>

                    <label class="cursor-pointer w-1/3 text-center">
                        <input type="radio" name="role" value="teacher" class="hidden peer" required>
                        <div class="px-4 py-2 rounded-md border border-gray-300 font-semibold text-gray-700 
                        peer-checked:bg-blue-600 peer-checked:text-white transition duration-200">
                            Teacher
                        </div>
                    </label>

                    <label class="cursor-pointer w-1/3 text-center">
                        <input type="radio" name="role" value="student" class="hidden peer" required>
                        <div class="px-4 py-2 rounded-md border border-gray-300 font-semibold text-gray-700 
                        peer-checked:bg-blue-600 peer-checked:text-white transition duration-200">
                            Student
                        </div>
                    </label>
                </div>

                <!-- Email -->
                <div>
                    <label class="text-gray-600 font-medium">Email</label>
                    <input type="email" name="email" required
                        class="w-full border border-gray-300 rounded-md p-2 mt-1 ">
                </div>

                <!-- Password -->
                <div>
                    <label class="text-gray-600 font-medium">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-md p-2 mt-1">
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-gray-600 text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        Remember me
                    </label>
                    <a href="#" class="text-blue-500 hover:underline">Forgot password?</a>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
                    Login
                </button>

                <!-- Signup Link -->
                <p class="text-center text-gray-600 text-sm mt-4">
                    Don’t have an account?
                    <a href="{{route('register')}}" class="text-blue-600 hover:underline font-medium">Sign up</a>
                </p>
            </form>
        </div>

        <!-- Image Side -->
        <div class="h-[550px] w-full md:w-[35vw] bg-no-repeat bg-contain bg-center rounded-r-xl bg-white shadow-xl p-10 bg-[url('{{ asset('image/Login.png') }}')]">
        </div>

    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>


@endif
@endsection