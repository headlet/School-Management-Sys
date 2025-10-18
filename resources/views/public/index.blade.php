@extends('layout.public.main')
@php
$p = asset("image/why/desktop-min.png");

@endphp
@section('content')
@include('public.components.hero')

@include('public.components.Info')

<section class="bg-[#113975] h-[1000px]">

    <div class="grid grid-cols-2 place-items-center text-white p-36">
        <div class="text w-[500px] h-[300px] ">
            <h2 class='text-2xl font-bold'>Why DEMO SCHOOL is the best school management?</h2>
            <p>“DEMO SCHOOL is the best school management system because it brings everything a school needs into one platform—easy to use, secure, and reliable.
                From admissions and attendance to exams, fees, and reports, it makes daily operations faster, smarter, and more organized for teachers, students, and parents.”</p>
        </div>
        <div class="relative bg-[url('{{$p}}')] w-[350px] h-[350px] bg-contain bg-no-repeat">
            <img src="{{asset('image/why/9-min.png')}}" alt="why2" class="w-38 h-28 z-10 absolute right-64 top-8 display dis1">
            <img src="{{asset('image/why/6-min.png')}}" alt="why1" class="w-25 h-20 z-20 absolute right-56 top-8 display dis2">
            <img src="{{asset('image/why/15-min.png')}}" alt="why3" class="w-36 h-22 z-30 absolute right-64 top-28 display dis3">
        </div>
    </div>
    <h2 class="text-2xl font-bold text-center mb-6">Gallery</h2>
    <div>

    </div>
</section>
<!-- Email,contact -->
<section class="bg-[#113975] flex justify-center items-center py-12 gap-x-16 text-white">
  <form action="" method="POST" class="p-8 w-[600px]">

    <h2 class="text-2xl font-bold text-center mb-6">Contact Us</h2>

    <!-- Name + Phone in one row -->
    <div class="flex gap-6 mb-4">
      <!-- Name -->
      <div class="w-1/2">
        <label for="name" class="block text-sm font-medium mb-1">Name</label>
        <input type="text" id="name" name="fullname" placeholder="John M"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <!-- Phone -->
      <div class="w-1/2">
        <label for="number" class="block text-sm font-medium mb-1">Phone</label>
        <input type="number" id="number" name="number"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
    </div>

    <!-- Email -->
    <div class="mb-4">
      <label for="Email" class="block text-sm font-medium mb-1">Email</label>
      <input type="email" id="Email" name="email"
             class="w-full px-4 py-2 border border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    <!-- Message -->
    <div class="mb-6">
      <label for="message" class="block text-sm font-medium mb-1">Message</label>
      <textarea id="message" name="message" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
    

    <!-- Button -->
    <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md transition">
      Send Message
    </button>
    </div>
  </form>

  <div class="w-[600px]">
    <div>
        <button>Email</button>
        <button>Phone</button>
        <button>Location</button>
    </div>
  </div>
</section>


@endsection