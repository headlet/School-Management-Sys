<nav class="bg-gray-900 text-white px-6 py-3 flex items-center justify-between shadow-lg h-16">
  <!-- Left Logo -->
 
  <div class="flex items-center ">
    <div class="w-52">
      <span class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-blue-300 bg-clip-text text-transparent ">
        Admin Panel
      </span>
    </div>
    <!-- Search -->
    <div class="w-[250px] flex">
      <input type="search" name="search" id="searchBox"
        class="form-control rounded  px-2 py-1 hidden text-black"
        placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
      <button type="button" class="text-white searchbtn p-2 rounded hover:bg-gray-700">
        <i class="bi bi-search"></i>
      </button>
    </div>
  </div>

  <!-- Right Profile -->
  <div class="flex items-center space-x-3 logout">
    <span class="hidden sm:block">{{ Auth::guard('admin')->user()->name }}</span>
    <img src="{{asset('storage/'. Auth::guard('admin')->user()->photo)}}" alt="profile"
      class="w-10 h-10 rounded-full border-2 border-gray-500">
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
  $('.searchbtn').click(function() {
    const searchBox = $("#searchBox");

    if (searchBox.hasClass("hidden")) {
      searchBox.removeClass("hidden");
      searchBox.focus();
    } else {
      const query = searchBox.val().trim();
      if (query !== "") {
        searchBox.closest('form').submit();
        console.log("Searching for:", query);

        //use ajax
      } else {
        searchBox.addClass('hidden');
      }
    }
  });

</script>