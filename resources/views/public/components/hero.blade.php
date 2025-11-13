@php
$s = asset('image/wave.png');
$w = asset('image/wave3 1.png');
$n = asset('image/wave3.png');
$q = asset('image/hero1.png');
@endphp


<section class="relative h-screen bg-[#113975] overflow-hidden flex items-center justify-center px-4">

  <!-- Content (on top of waves) -->
  <div class="relative z-[1100] text-center text-white flex flex-col md:flex-row justify-center items-center gap-4 w-full max-w-[1200px]">

    <div class="h-auto md:h-[60vh] mt-20 md:mt-60 max-w-md text-center md:text-left">
      <h1 class="anim text-xl md:text-3xl font-bold mb-4" id="htext">Hello, This is School Management Sys</h1>

      <p class="anim text-base md:text-lg opacity-80 max-w-md mx-auto md:mx-0" id="ptext">
        Welcome to our page.
      </p>
    </div>

    <div class="w-full max-w-[550px] h-auto md:h-[418px] mb-20 md:mb-36 bg-[url('{{$q}}')] bg-contain bg-no-repeat bg-center flex justify-center items-center animate-bg-float anim" id="ianim" >
      <img src="{{ asset('image/hero2.png') }}" alt="HeroImg" class="w-[200px] md:w-[300px] h-[200px] md:h-[300px] animate-img-float">
    </div>

  </div>

  <!-- Foreground wave -->
  <div class="wave z-[1000] absolute left-0 bottom-0 w-full h-[100px] opacity-100"
    style="background-image: url('{{ $w }}'); background-size: 2000px 100px; background-repeat: repeat-x;">
  </div>

  <!-- Mid wave -->
  <div class="wave2 z-[999] absolute left-0 bottom-0 w-full h-[160px] opacity-60"
    style="background-image: url('{{ $n }}'); background-size: 2000px 160px; background-repeat: repeat-x;">
  </div>

  <!-- Deep background wave -->
  <div class="wave3 z-[998] absolute left-0 bottom-0 w-full h-[200px] opacity-40"
    style="background-image: url('{{ $s }}'); background-size: 2000px 200px; background-repeat: repeat-x;">
  </div>

</section>
