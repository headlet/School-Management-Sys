@extends("admin.index")
@section('content')
<section>
<div class="w-full flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0 min-h-14 sm:h-14 border border-gray-300 rounded-lg shadow-md px-3 sm:px-4 py-3 sm:py-0 mb-4 sm:mb-6 bg-white">
        <h2 class="text-base sm:text-lg font-semibold text-gray-800">Class {{$class}}</h2>

    </div>
@foreach($section as $sections)
    <p>{{$sections->Section}}</p>
@endforeach
</section>
@endsection