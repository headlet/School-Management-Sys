<!-- Navbar -->
<nav class="fixed   top-0 left-0 z-[1200] bg-[#113975] w-full h-20 flex items-center justify-between px-4 md:px-8">
    <!-- Logo -->
    <a href="{{route('home')}}"><div class="w-10 h-10 md:w-12 md:h-12 bg-[url('{{asset('image/1.jpg')}}')] bg-contain bg-no-repeat bg-center border rounded-full"></div></a>

    <!-- Hamburger Button (Mobile) -->
    <div class="md:hidden ">
        <button id="menu-btn" class="text-white focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Links -->
    <div id="menu" class="hidden md:flex gap-4 items-center">
        <a href="{{route('home')}}" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">Home</a>
        <a href="#" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">Gallery</a>
        <a href="#" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">News & Event</a>
        <a href="#" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">Services</a>
        <a href="#" class="px-3 py-1 rounded hover:bg-blue-400 text-white transition">About Us</a>

        @guest('admin')
        <a href="{{route('login')}}" class="px-3 py-2 text-white border-2 border-black rounded-lg bg-black hover:bg-amber-50 hover:text-black">
            🔓 Login
        </a>
        @endguest

        @auth('admin')
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-3 py-2 text-white border-2 border-black rounded-lg bg-black hover:bg-amber-50 hover:text-black">
               🔒 Logout
            </button>
        </form>
        @endauth
    </div>
</nav>

<!-- Mobile Menu Script -->
<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        menu.classList.toggle('flex');
        menu.classList.toggle('flex-col');
        menu.classList.toggle('gap-4');
        menu.classList.toggle('bg-[#113975]');
        menu.classList.toggle('p-4');
        menu.classList.toggle('absolute');
        menu.classList.toggle('top-20');
        menu.classList.toggle('right-0');
        menu.classList.toggle('w-full');
        menu.classList.toggle('md:flex');
    });
</script>
