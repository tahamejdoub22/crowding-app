
 <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
                <!-- Logo -->
                   

                <!-- Navigation Links -->
                           


            <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                       <ul> <td><img style="max-width:20%;
                        max-height:20%;" width="30" height="30" class="d-inline-block align-top" src="{{asset('Image/aa.jpg')}}" alt=""/>
</td><td>{{ Auth::user()->name }}</td></ul>
                        <ul  align="center">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            </ul>
                               
                    </x-slot>
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

            <!-- Hamburger -->
             

    <!-- Responsive Navigation Menu -->
   

        <!-- Responsive Settings Options -->
                

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
</nav>
    </a>