<!-- Navbar -->
<nav class="fixed top-0 left-0 w-full z-[1200] py-2  bg-[#113975] h-20">
  <!-- Inner container limited to 80vw -->
  <div class="w-[80vw] mx-auto flex items-center justify-between px-6 py-2">

    <!-- Logo -->
    <div class="w-10 h-10 md:w-12 md:h-12 bg-[url('{{asset('image/1.jpg')}}')] bg-contain bg-no-repeat bg-center border rounded-[100%]"></div>

    <!-- Links -->
    <div class="hidden md:flex gap-4">
       <a href="{{route('home')}}" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">Home</a>
      <a href="#" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">Gallery</a>
      <a href="#" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">News & Event</a>
      <a href="#" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">Services</a>
      <a href="#" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">About Us</a>
    </div>

    <!-- Login Dropdown -->
    <a href="{{route('Login')}}" name="login" class="px-2 py-1 text-white bg-transparent ">
      🔒Login

    </a>

  </div>
</nav>