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
    @guest('admin')
    <!-- Login Dropdown -->
    <a href="{{route('login')}}" name="login" class="px-3 py-2 text-white  border-2 border-black rounded-lg bg-black hover:bg-amber-50 hover:text-black">
      🔒Login

    </a>
    @endguest


    @auth('admin')
    <form method="POST" action="{{ route('logout') }}" id="logout-form" class="px-3 py-2 text-white  border-2 border-black rounded-lg bg-black hover:bg-amber-50 ">
                @csrf
                <button type="submit" class="text-white hover:text-black">Logout</button>
            </form>
    @endauth
  </div>
</nav>