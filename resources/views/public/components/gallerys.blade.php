@php
use App\Models\Gallery;
$gallery = Gallery::latest()->take(6)->get();
@endphp

<section class="bg-[#113975] py-10">
    <h2 class="text-3xl font-bold text-center text-white">Gallery</h2>

    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-2 p-8 w-[90vw] md:w-[80vw] mx-auto">
        @foreach($gallery as $img)
            <div class="w-full aspect-[4/3] border-2 border-black overflow-hidden bg-white">
                <img src="{{ asset('storage/' . $img->photo) }}" 
                     alt="{{ $img->name ?? 'Gallery Image' }}" 
                     class="w-full h-full object-cover">
            </div>
        @endforeach
    </div>

    <div class="text-center mt-6">
        <a href="#"
           class="inline-block bg-black hover:bg-white hover:text-black text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
           View More
        </a>
    </div>
</section>
