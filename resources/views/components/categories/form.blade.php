<div>

    <form action="{{ $action }}" method="POST" class="max-w-sm mx-auto">
        @csrf

        @if($update)
            @method('PUT')
        @endif

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="col-span-full">
                <label class="block text-sm/6 font-medium text-white"
                       for="type_id">
                    Tipo
                </label>
                <div class="mt-2 grid grid-cols-1">
                    <select id="type_id" name="type_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-gray-500 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-teal-600 sm:text-sm/6">
                        <option disabled selected value>Selecione uma opção</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}"
                            @if($update)
                                {{ $category->type_id === $type->id ? 'selected' : '' }}
                                @endif >
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-span-full">
                <label class="block text-sm/6 font-medium text-white"
                       for="name">
                    Nome
                </label>
                <div class="mt-2">
                    <input class="block w-full grow bg-gray-200 dark:bg-gray-800 rounded-md py-1.5 pr-3 pl-3 text-base text-white placeholder:text-white focus:outline-none sm:text-sm/6"
                           name="name"
                           id="name"
                           type="text"
                           required
                           @if($update) value={{ old('name', $category->name) }} @endif
                    >
                </div>
            </div>

            <div class="col-span-full mt-6 flex items-center justify-center gap-x-6">
                <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">
                    @if($update)
                        Editar
                    @else
                        Adicionar
                    @endif
                </button>
                <a href="{{ route('categories.index') }}">
                    <button type="button" class="text-sm/6 font-semibold text-white">
                        Cancelar
                    </button>
                </a>
            </div>

        </div>

    </form>

</div>
