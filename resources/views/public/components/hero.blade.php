@php
$s = asset('image/wave.png');
$w = asset('image/wave3 1.png');
$n = asset('image/wave3.png');
$q = asset('image/hero1.png');
@endphp


<section class="relative w-full h-[100vh] bg-[#113975] overflow-hidden flex  items-center justify-center">

  <!-- Content (on top of waves) -->
  <div class="relative z-[1100] text-center text-white flex justify-between items-center gap-4 w-[80vw]">
    <div class='h-[60vh] mt-60'>
      <h1 class="anim text-3xl font-bold mb-4" id='htext'>Hello, This is School Management Sys</h1>
      
      <p class="anim text-lg opacity-80 max-w-md" id='ptext'>
        Welcome to our page.
      </p>
    </div>
    <div class="w-[550px] h-[418px] mb-36 right-0 bg-[url('{{$q}}')] flex justify-center items-center animate-bg-float anim" id="ianim" >
      <img src="{{ asset('image/hero2.png') }}" alt="HeroImg" class="w-[300px] h-[300px] animate-img-float">
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