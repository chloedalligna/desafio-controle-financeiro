<x-layout title="Crie a sua conta e comece a gerenciar suas finanças!">

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf

            <div class="sm:col-span-4">
                <label for="username" class="block text-sm/6 font-medium text-white">Nome de usuário</label>
                <div class="mt-2">
                    <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                        <input id="username" type="text" name="username" placeholder="fulanodasilva" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                    </div>
                </div>
            </div>


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
                <label class="block text-sm/6 font-medium text-gray-100"
                       for="password">
                    Senha
                </label>
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
                <label class="block text-sm/6 font-medium text-gray-100"
                       for="password">
                    Confirmação da senha
                </label>
                <div class="mt-2">
                    <input class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                           name="confirm_password"
                           id="confirm_password"
                           type="password"
                           required
                           autocomplete="current-password">
                </div>
            </div>

            <div>
                <button class="flex w-full justify-center rounded-md bg-teal-600 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-teal-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                        type="submit">
                    Criar conta
                </button>
            </div>

        </form>

    </div>

</x-layout>




