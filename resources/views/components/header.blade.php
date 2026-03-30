<header class="bg-white dark:bg-gray-800">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="md:flex md:items-center md:gap-12">
                <a class="block font-semibold text-teal-600" href="{{ route('transactions.index') }}">
                    <span>
                        Home
                    </span>
                </a>
            </div>

            @auth
            <div class="hidden md:block">
                <nav aria-label="Global">
                    <ul class="flex items-center gap-6 text-sm">
                        <li>
                            <a class="text-gray-500 transition font-semibold hover:text-gray-500/75" href="{{ route('transactions.create') }}">
                                Criar nova transação
                            </a>
                        </li>
                        @if(session('admin'))
                            <li>
                                <a class="text-gray-500 transition font-semibold hover:text-gray-500/75" href="{{ route('categories.create') }}">
                                    Criar nova categoria
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition font-semibold hover:text-gray-500/75" href="{{ route('types.create') }}">
                                    Criar novo tipo
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @endauth

            <div class="flex items-center gap-4">
            @guest
                <div class="sm:flex sm:gap-4">
                @if(request()->routeIs('signup'))
                        <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm dark:hover:bg-teal-500"
                           href="{{ route('login') }}">
                            Entrar
                        </a>
                @else
                        <div class="hidden sm:flex">
                            <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-semibold text-teal-600 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
                               href="{{ route('signup') }}">
                                Criar conta
                            </a>
                        </div>
                @endif
                </div>
            @endguest

            @auth
            <el-popover-group class="hidden lg:flex lg:gap-x-12">
                <div class="relative">

{{--                <div class="md:relative md:block">--}}

                    <button popovertarget="desktop-menu-product" type="button" class="flex items-center gap-x-1 text-sm/6 font-semibold text-white">
                        <span class="mr-2">
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 flex-none text-gray-500">
                                <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="sr-only">Ativar menu suspenso</span>
                        <img class="-mr-6 size-10 object-cover overflow-hidden rounded-full border border-gray-300 shadow-inner" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" alt="">
                    </button>

                    <el-popover id="desktop-menu-product" anchor="bottom" popover class="max-w-md overflow-hidden rounded-3xl bg-gray-800 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(3)] backdrop:bg-transparent open:block open:right-0 data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-150 data-leave:ease-in">
                        <div class="p-2" >
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-white/5">
                                <div class="flex-auto">
                                    <a href="#" class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700" role="menuitem">
                                        Meu perfil
                                    </a>
                                </div>
                            </div>
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-white/5">
                                <div class="flex-auto">
                                    <a href="#" class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700" role="menuitem">
                                        Assinatura Premium
                                    </a>
                                </div>
                            </div>
                            <div class="p-2">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50" role="menuitem">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"></path>
                                        </svg>
                                        Sair
                                    </button>
                                </form>
                            </div>
                        </div>
                    </el-popover>
                </div>
            </el-popover-group>
        </div>
        </div>
            @endauth
            </div>
    </div>

{{--    <div>--}}
{{--        <nav class="border-b-black mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">--}}
{{--            <ul class="decoration-0">--}}
{{--                @guest--}}
{{--                @if(request()->routeIs('signup'))--}}
{{--                    <li>--}}
{{--                        <a class="text-sm/6 font-semibold text-white">--}}
{{--                            Entrar--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li>--}}
{{--                        <a class="text-sm/6 font-semibold text-white">--}}
{{--                            Criar conta--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--                @endguest--}}
{{--                @auth--}}
{{--                    <li>--}}
{{--                        <a class="text-sm/6 font-semibold text-white">--}}
{{--                            Sair--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endauth--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--    </div>--}}
</header>
