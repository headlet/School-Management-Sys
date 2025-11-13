<!-- Contact Section -->
<section class="bg-[#113975] py-12 px-6  text-white w-full">

    <h2 class="text-3xl font-bold text-center  text-white">Contact Us</h2>
    <div class="bg-[#113975] flex flex-col lg:flex-row justify-center items-center  gap-12 ">


        <!-- Contact Form -->
        <form action="" method="POST"
            class="bg-transparent text-black  p-8 w-full max-w-lg  lg:h-[500px]">



            <!-- Name + Phone (responsive row) -->
            <div class="flex flex-col sm:flex-row gap-4 mb-4 text-white">
                <!-- Name -->
                <div class="w-full sm:w-1/2">
                    <label for="name" class="block text-sm font-medium mb-1 ">Name</label>
                    <input type="text" id="name" name="fullname" placeholder="John M"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg  focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Phone -->
                <div class="w-full sm:w-1/2">
                    <label for="number" class="block text-sm font-medium mb-1 ">Phone</label>
                    <input type="number" id="number" name="number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg  focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="Email" class="block text-sm font-medium mb-1 text-white">Email</label>
                <input type="email" id="Email" name="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Message -->
            <div class="mb-6">
                <label for="message" class="block text-sm font-medium mb-1 text-white">Message</label>
                <textarea id="message" name="message" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-black hover:bg-white hover:text-black text-white font-semibold py-3 rounded-lg shadow-md transition">
                Send Message
            </button>
        </form>

        <!-- Contact Info & Tabs -->
        <div class="w-full max-w-md text-center lg:text-left lg:mb-16 ">
            <!-- Tabs -->
            <div id="tabButtons" class="flex justify-center lg:justify-start space-x-4 ">
                <button class="tab-btn border-b-2 border-transparent hover:border-gray-300 px-2 py-1 defaults">Email</button>
                <button class="tab-btn border-b-2 border-transparent hover:border-gray-300 px-2 py-1">Phone</button>
                <button class="tab-btn border-b-2 border-transparent hover:border-gray-300 px-2 py-1">Location</button>
            </div>

            <!-- Tab Content -->
            <div class="p-6 contain-contact text-gray-100 text-lg"></div>

            <!-- Image -->
            <img src="{{ asset('image/contact.png') }}" alt="contact"
                class="mx-auto lg:mx-0 w-64 md:w-[400px] lg:w-[500px] mt-4">
        </div>

    </div>
</section>

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.defaults').addClass('border-blue-400 text-blue-400');
        $('.contain-contact').html('<i class="fa-solid fa-envelope"></i> <p>Email: Anish@gmail.com</p>');

        $('#tabButtons .tab-btn').click(function() {
            $('#tabButtons .tab-btn').removeClass('border-blue-400 text-blue-400');
            $(this).addClass('border-blue-400 text-blue-400');

            let value = $(this).text().trim();
            let content = '';

            if (value === 'Email') {
                content = '<i class="fa-solid fa-envelope"></i> <p>Email: Anish@gmail.com</p>';
            } else if (value === 'Phone') {
                content = '<p>Phone: +977-9812345678</p>';
            } else if (value === 'Location') {
                content = '<p>Location: Kathmandu, Nepal</p>';
            }

            $('.contain-contact').html(content);
        });
    });
</script>