@extends('admin.index')

@section('content')
<div class="pb-2">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0 min-h-14 sm:h-14 border border-gray-300 rounded-lg shadow-md px-3 sm:px-4 py-2 sm:py-0 mb-3 sm:mb-4 bg-white">
        <h2 class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">Gallery</h2>

        <div class="flex items-center gap-x-2 text-black w-full sm:w-auto">
            <!-- Search Button -->
            <button type="button"
                class="flex items-center px-3 py-1.5 sm:py-2 text-xs sm:text-sm md:text-base rounded-md bg-gray-200 hover:bg-gray-300 transition w-full sm:w-auto justify-center">
                <i class="bi bi-search mr-1"></i>
                <span>Search</span>
            </button>

            <!-- Upload Form (Same UI as button) -->
            <form action="{{ route('uploadimg') }}" method="post" enctype="multipart/form-data"
                class="flex items-center px-3 py-1.5 sm:py-2 text-xs sm:text-sm md:text-base rounded-md bg-gray-200 hover:bg-gray-300 transition w-full sm:w-auto justify-center cursor-pointer">
                @csrf
                <label class="flex items-center cursor-pointer text-black hover:text-black w-full h-full justify-center">
                    <i class="fas fa-plus "></i>
                    <span>Add Images</span>
                    <input type="file" name="photo" class="hidden" onchange="this.form.submit()">
                </label>
            </form>

            <button type="button"
                class="flex items-center px-3 py-1.5 sm:py-2 text-xs sm:text-sm md:text-base rounded-md bg-gray-200 hover:bg-gray-300 transition w-full sm:w-auto justify-center  disabled:opacity-50 disabled:cursor-not-allowed" id="deletebttn" disabled>
                <span>DELETE</span>
            </button>
        </div>

    </div>

    <!-- Gallery Grid -->
    <div id="gallery" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 place-items-center">

        @if ($img->count() > 0)
        @foreach ($img as $index => $imgs)
        <div class="w-full aspect-[3/2] md:aspect-[4/3] border-2 border-white overflow-hidden shadow-lg shadow-black btnhide">
            <input type="checkbox" data-id="{{$imgs->id}}" data-url="{{route('deleteimg', $imgs->id)}}" class="deleteid absolute w-6 h-6 hidden btnhide">
            <img src="{{ asset('storage/' . $imgs->photo) }}"
                class="w-full h-full object-cover cursor-pointer imgclick btnhide"
                id='' data-id='{{$index}}'>

        </div>
        @endforeach
        @endif

    </div>

    <!-- Pagination -->
    <div class="m-4">
        {{ $img->links('pagination::bootstrap-5') }}
    </div>

    @if ($img->count() == 0)
    <p class="text-center text-gray-500 mt-4">No images found.</p>
    @endif

</div>

<!-- Fullscreen Image Viewer -->
<div id="viewer" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 justify-center items-center w-full h-full">
    <h2 class="absolute top-5 left-5 text-white text-3xl font-bold"></h2>
    <button class="absolute left-5 text-white text-4xl font-bold prevbtn">&lsaquo;</button>
    <img id="viewerImg"
        class="w-full h-auto lg:h-full lg:px-60 rounded shadow-lg object-contain">



    <button class="absolute right-5 text-white text-4xl font-bold nxtbtn">&rsaquo;</button>

    <button class="absolute top-5 right-5 text-white text-3xl font-bold closebtn">&times;</button>
    <div class="absolute bottom-9 right-4 bg-white flex items-center justify-between w-32 h-10 px-4 rounded-full shadow-md border border-gray-300 text-black text-xl">
        <button class="hover:text-green-600 font-bold text-2xl leading-none">+</button>
        <button type="button"
            class="flex items-center text-xs sm:text-sm md:text-base rounded-m text-red-500 hover:text-red-700 transition0 transition w-full sm:w-auto justify-center">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        <button class="hover:text-blue-600 font-bold text-2xl leading-none">−</button>

    </div>

</div>

<!-- JavaScript -->
<script>
    let galleryImages = [];
    let index = 0;

    $(document).ready(function() {
        galleryImages = $('#gallery img').toArray();
        console.log("Loaded images:", galleryImages.length);
        

        $('.imgclick').click(function() {
            index = $(this).data('id');
            $('#viewerImg').attr('src', galleryImages[index].src);
            $('#viewer').removeClass('hidden').addClass('flex');
        });

        $('.closebtn').click(function() {
            $('#viewer').toggleClass('hidden flex');
        });

        $('.nxtbtn').click(function() {
            index = (index + 1) % galleryImages.length;
            $('#viewerImg').attr('src', $(galleryImages[index]).attr('src'));
        });


        $('.prevbtn').click(function() {
            index = (index - 1 + galleryImages.length) % galleryImages.length;
            $('#viewerImg').attr('src', $(galleryImages[index]).attr('src'));
        });

    });

    $('.btnhide').hover(
        function() { // mouse enter
            $(this).find('.deleteid').removeClass('hidden');
        },
        function() { // mouse leave
            let checkbox = $(this).find('.deleteid');
            if (checkbox.is(':checked')) {
                checkbox.removeClass('hidden'); // keep visible if checked
            } else {
                checkbox.addClass('hidden'); // hide if not checked
            }
        }
    );



    //delete
    $('.deleteid').click(function() {
        if ($('.deleteid:checked').length > 0) {
            $('#deletebttn').removeAttr('disabled');
        } else {
            $('#deletebttn').attr('disabled', 'true');
        }
    });


    $('#deletebttn').click(function() {
        let selected = [];

        $('.deleteid:checked').each(function() {
            selected.push({
                id: $(this).data('id'),
                url: $(this).data('url')
            });
        });

        if (selected.length === 0) {
            return Swal.fire('No selection', 'Please choose images to delete.', 'info');
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                selected.forEach(e => {
                    $.ajax({
                        url: e.url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: e.id
                        },
                        success: function(response) {
                            if (response.success) {
                                // remove DOM tile
                                $(`.deleteid[data-id='${e.id}']`).closest('div').fadeOut(400, function() {
                                    $(this).remove();
                                });

                                // optional: small success toast
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted',
                                    text: response.message,
                                    timer: 1200,
                                    showConfirmButton: false
                                });

                                // disable delete button if nothing left checked
                                if ($('.deleteid:checked').length === 0) {
                                    $('#deletebttn').attr('disabled', true);
                                }
                            } else {
                                Swal.fire('Error', response.message || 'Delete failed', 'error');
                            }
                        },
                        error: function(xhr) {
                            let msg = 'Delete failed';
                            try {
                                const json = JSON.parse(xhr.responseText);
                                if (json.message) msg = json.message;
                            } catch (e) {}
                            Swal.fire('Error', msg, 'error');
                            console.error(xhr.responseText);
                        }
                    });
                });
            }
        });
    });

    // checkbox toggle
    $(document).on('change', '.deleteid', function() {
        if ($('.deleteid:checked').length > 0) {
            $('#deletebttn').removeAttr('disabled');
        } else {
            $('#deletebttn').attr('disabled', true);
        }
    });
</script>

@endsection