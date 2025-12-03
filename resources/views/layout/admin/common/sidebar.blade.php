<div class="d-flex h-[100vh]">
    <nav class="sidebar relative overflow-visible bg-gradient-to-br from-[#1a1c2e] to-[#16181f] flex flex-col transition-all duration-500 ease-in-out text-white w-56 h-screen">

        <!-- Toggle Button -->
        <button
            class="toggle-btn absolute top-10 right-[-15px] bg-black w-[30px] h-[30px] border border-gray-300 rounded-full flex items-center justify-center shadow-xl transition-all duration-500 z-[100]"
            type="button">
            <i class="fas fa-chevron-left text-white icon transition-transform duration-500"></i>
        </button>

        <!-- Scrollable wrapper -->
        <div class="flex-1 overflow-y-auto overflow-x-hidden mb-16 [scrollbar-width:none] ">
            <!-- Navigation Links -->
            <div class="nav flex flex-col space-y-2 p-2 pb-6">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-3 gap-2.5 {{ request()->routeIs('dashboard') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar' }}">
                    <i class="fas fa-home"></i>
                    <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Dashboard</span>
                </a>

                <!-- multiple student -->
                <button class="studentbtn w-full flex items-center justify-items-start gap-x-3 rounded hover:bg-gray-700 focus:outline-none p-3">
                    <i class="fa-solid fa-graduation-cap"></i> <span class='hide-on-collapse'>Students</span>
                </button>
                <ul class='hidden students list list-circle text-sm border-l-2 ml-4'>
                    <li>
                        <a href="{{route('student')}}" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('student') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">All Students</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('addstudent')}}" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('addstudent') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Add New</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('stdcard')}}" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('stdcard') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Student ID Card</span>
                        </a>
                    </li>

                    <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Promote Students</span>
                        </a>
                    </li>
                </ul>

                <!-- Multiple teacher -->
                <button class="teacherbtn w-full flex items-center justify-items-start gap-x-3 p-3 rounded hover:bg-gray-700 focus:outline-none">
                    <i class="fas fa-chart-bar"></i> <span class='hide-on-collapse'>Teachers</span>
                </button>
                <ul class='hidden teachers list list-circle border-l-2 text-sm ml-4'>
                    <li>
                        <a href="{{route('teacher')}}" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('teacher') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">All Teachers</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('addteacher')}}" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('addteacher') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Add Teachers</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('teachercard')}}" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('teachercard') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Staff ID Cards</span>
                        </a>
                    </li>
                </ul>

                <!-- Classes -->
                <button class="classbtn w-full flex items-center justify-items-start gap-x-3 p-3 rounded hover:bg-gray-700 focus:outline-none">
                    <i class="fas fa-users"></i> <span class='hide-on-collapse'>Classes</span>
                </button>
                <ul class='hidden class list list-circle border-l-2 text-sm ml-4'>
                    <li>
                        <a href="{{route('class')}}" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('class') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">All Classes</span>
                        </a>
                    </li>

                    <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">New Classes</span>
                        </a>
                    </li>

                </ul>
                
                <!-- Subject -->
                <button class="subjectbtn w-full flex items-center justify-items-start gap-x-3 p-3 rounded hover:bg-gray-700 focus:outline-none">
                    <i class="fas fa-box"></i> <span class='hide-on-collapse'>Subject</span>
                </button>
                <ul class='hidden subject list list-circle border-l-2 text-sm ml-4'>
                    <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Classes with Subject</span>
                        </a>
                    </li>

                    <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Assign Subject</span>
                        </a>
                    </li>

                </ul>

                <!-- attendance -->
                <button class="attbtn w-full flex items-center justify-items-start gap-x-3 p-3 rounded hover:bg-gray-700 focus:outline-none">
                    <i class="fas fa-box"></i> <span class='hide-on-collapse'>Attendance</span>
                </button>
                <ul class='hidden att list list-circle border-l-2 text-sm ml-4'>
                    <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Student Attendance</span>
                        </a>
                    </li>

                    <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Teacher Attendance</span>
                        </a>
                    </li>

                    <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Student Attendance Reports</span>
                        </a>
                    </li>

                    <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Teacher Attendance Reports</span>
                        </a>
                    </li>

                     <li>
                        <a href="" class="flex items-center gap-3 p-3 font-normal {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar'}}">
                            <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Class wise report</span>
                        </a>
                    </li>
                </ul>

                <!-- homework
                  <a href=""
                    class="flex items-center p-3 gap-2.5 {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar' }}">
                    <i class="fas fa-home"></i>
                    <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">HomeWork</span>
                </a> -->

                <!-- Question Paper -->
                    <!-- Exams reports results class test messaging  -->

                <a href="{{route('gallery')}}"
                    class="flex items-center p-3 gap-2.5 {{ request()->routeIs('') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar' }}">
                    <i class="lni lni-gallery text-[20px]"></i>
                    <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Gallery</span>
                </a>

            </div>
        </div>
    </nav>
 
</div>


<script>
    $('.toggle-btn').click(function() {
        $('.icon').toggleClass('rotate-180');
        $('.sidebar').toggleClass('w-56 w-14');
        $('.main').toggleClass('ml-56 ml-14');
        $('.hide-on-collapse').toggleClass('opacity-0 scale-0');
        $('.list').addClass('hidden').toggleClass('students');
    });

    $('.studentbtn').click(function() {
        $('.students').toggleClass('hidden');
    });

    $('.teacherbtn').click(function() {
        $('.teachers').toggleClass('hidden');
    });

    $('.classbtn').click(function() {
        $('.class').toggleClass('hidden');
    });

    $('.subjectbtn').click(function() {
        $('.subject').toggleClass('hidden');
    });

    $('.attbtn').click(function() {
        $('.att').toggleClass('hidden');
    });
</script>