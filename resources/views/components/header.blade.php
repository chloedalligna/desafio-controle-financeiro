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
                            <a href="{{ route('transactions.create') }}" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">
                                Adicionar transação
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}" class="text-gray-300 transition font-semibold hover:text-gray-500/75" >
                                Categorias
                            </a>
                        </li>
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
                                <a class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500 dark:text-white dark:hover:text-white/75"
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
                        <button style="anchor-name: --my-anchor;" id="anchor" popovertarget="desktop-menu-product" type="button" class="flex items-center gap-x-1 text-sm/6 font-semibold text-white">
                            <span class="mr-2">
                                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 flex-none text-gray-300">
                                    <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="sr-only">Ativar menu suspenso</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512" class="size-6 text-gray-300"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M224 248a120 120 0 1 0 0-240 120 120 0 1 0 0 240zm-29.7 56C95.8 304 16 383.8 16 482.3 16 498.7 29.3 512 45.7 512l356.6 0c16.4 0 29.7-13.3 29.7-29.7 0-98.5-79.8-178.3-178.3-178.3l-59.4 0z"/></svg>
                        </button>

                        <el-popover style="position: absolute; position-anchor: --my-anchor; position-area: bottom;" id="desktop-menu-product" popover class="max-w-md mr-4 mt-4 overflow-hidden rounded-3xl bg-gray-800 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete backdrop:bg-transparent open:block data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-150 data-leave:ease-in">
                            <div class="p-2" >
                                <div class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm/6">
                                    <div class="flex-auto">
                                        <a href="#" class="block rounded-lg px-4 py-2 text-sm text-gray-300 hover:bg-gray-50 hover:text-gray-700" role="menuitem">
                                            Meu perfil
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm/6">
                                    <div class="flex-auto">
                                        <a href="#" class="block rounded-lg px-4 py-2 text-sm text-gray-300 hover:bg-gray-50 hover:text-gray-700" role="menuitem">
                                            Assinatura Premium
                                        </a>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="flex w-full items-center gap-2 rounded-lg px-4 py-2 font-bold text-sm text-red-700 hover:bg-red-50" role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
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
                @endauth
            </div>
        </div>
    </div>
</header>
