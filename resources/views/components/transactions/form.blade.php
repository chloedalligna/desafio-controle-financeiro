<div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $action }}" method="POST" class="max-w-sm mx-auto">
        @csrf

        @if($update)
            @method('PUT')
        @endif

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div  class="col-span-full">
                <label class="block text-sm/6 font-medium text-white"
                       for="name">
                    Nome da transação
                </label>
                <div class="mt-2">
                    <input class="block max-w grow bg-gray-200 dark:bg-gray-800 rounded-md py-1.5 pr-3 pl-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"
                           name="name"
                           id="name"
                           type="text"
                           required
                           value={{ $name }}>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm/6 font-medium text-white"
                       for="category_id">
                    Categoria da transação
                </label>
                <div class="mt-2 grid grid-cols-1">
                    <select id="category_id" name="category_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-gray-500 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-teal-600 sm:text-sm/6">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @if($update)
                                {{ $transaction->category_id == $category->id ? 'selected' : '' }}
                            @endif >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm/6 font-medium text-white"
                       for="value">
                    Valor monetário
                </label>
                <div class="mt-2">
                    <input class="block min-w-0 grow bg-gray-200 dark:bg-gray-800 rounded-md py-1.5 pr-3 pl-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"
                           name="value"
                           id="value"
                           type="text"
                           required
                           value="{{ $value }}">
                </div>
            </div>

            <div class="col-span-full ">
                <label class="block text-sm/6 font-medium text-white"
                       for="description">
                    Descrição
                </label>
                <div class="mt-2">
                    <input class="block max-w grow bg-gray-200 dark:bg-gray-800 rounded-md py-1.5 pr-3 pl-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"
                           name="description"
                           id="description"
                           type="text"
                           required
                           value="{{ $description }}">
                </div>
            </div>

            {{--        <input class="btn" name="login-button" id="login-button" type="submit" value="Entrar">--}}

            <div class="mt-6 flex items-center justify-center gap-x-6">
                <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    Adicionar
                </button>
                <a href="{{ route('transactions.index') }}">
                    <button type="button" class="text-sm/6 font-semibold text-white">
                        Cancelar
                    </button>
                </a>
            </div>

        </div>

    </form>

</div>
