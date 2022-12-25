<header>
    <nav
        class="
          flex flex-wrap
          justify-between
          md:flex-row
          w-full
          py-4
          md:py-0
          px-4
          text-lg text-gray-700
          bg-white
        "
    >

        <svg
            xmlns="http://www.w3.org/2000/svg"
            id="menu-button"
            class="h-6 w-6 cursor-pointer md:hidden block"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
            />
        </svg>
        <div >
            <p class="font-bold">{{auth()->user()->dueTasks()}} <span class="text-red-500">due tasks</span></p>
            <p class="font-bold">{{auth()->user()->completedTasks()}} <span class="text-green-500">completed tasks</span></p>
        </div>
        <div class="hidden w-full md:flex md:items-end space-between flex-row md:w-auto" id="menu">

            <ul
                class="
                flex-row
                flex
                items-center
              pt-4
              text-base text-gray-700
              md:pt-0"
            >
                <li>
                    <a
                        class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
                        href="{{route('categories.index')}}"
                    >Categories</a
                    >
                </li>
                <li>
                    <a
                        class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
                        href="{{route('tasks.index')}}"
                    >Tasks</a
                    >
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-purple-400" href="{{route('tasks.create')}}"> + </a>
                </li>

                <li>
                    @auth
                        <p>{{auth()->user()->name}}</p>
                    @endauth
                    @guest
                        <a class="md:p-4 py-2 block hover:text-purple-400" href="{{route('login')}}">Log in</a>
                    @endguest
                </li>
            </ul>
        </div>
    </nav>
</header>

<script>
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');


    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

</script>
