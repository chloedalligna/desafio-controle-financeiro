<x-layout title="Entre na sua conta">

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <form action="{{ route('signin') }}" method="post" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm/6 font-medium text-gray-100"
                       for="email">
                    E-mail
                </label>
                <div class="mt-2">
                    <input class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                           name="email"
                           id="email"
                           type="email"
                           required
                           autocomplete="email">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label class="block text-sm/6 font-medium text-gray-100"
                           for="password">
                        Senha
                    </label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-teal-600 hover:text-teal-300">
                            Esqueci a senha
                        </a>
                    </div>
                </div>
                <div class="mt-2">
                    <input class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                           name="password"
                           id="password"
                           type="password"
                           required
                           autocomplete="current-password">
                </div>
            </div>

            <div>
                <button class="flex w-full justify-center rounded-md bg-teal-600 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-teal-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                        type="submit">
                    Entrar
                </button>
            </div>

        </form>

    </div>

</x-layout>

{{--bg-indigo-500--}}
