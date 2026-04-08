<div>

    <form action="{{ $action }}" method="POST" class="max-w-sm mx-auto">
        @csrf

        @if($update)
            @method('PUT')
        @endif

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-3">
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
                                {{ $transaction->category->type_id === $type->id ? 'selected' : '' }}
                            @endif >
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm/6 font-medium text-white"
                       for="category_id">
                    Categoria
                </label>
                <div class="mt-2 grid grid-cols-1">
                    <select id="category_id" name="category_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-gray-500 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-teal-600 sm:text-sm/6">
                        <option disabled selected value>Selecione uma opção</option>
                        @foreach($categories as $category)
                            <option disabled label="{{ $category->name }}" value="{{ $category->id }}"
                            @if($update)
                                {{ $transaction->category_id == $category->id ? 'selected' : '' }}
                            @endif >
                                {{ $category->type_id }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-span-full">
                <label class="block text-sm/6 font-medium text-white"
                       for="description">
                    Descrição
                </label>
                <div class="mt-2">
                    <input class="block w-full grow bg-gray-200 dark:bg-gray-800 rounded-md py-1.5 pr-3 pl-3 text-base text-white placeholder:text-white focus:outline-none sm:text-sm/6"
                           name="description"
                           id="description"
                           type="text"
                           required
                           @if($update) value={{ old('description', $transaction->description) }} @endif
                    >
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
                           @if($update) value={{ old('value', (float) $transaction->value) }} @endif
                    >
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm/6 font-medium text-white"
                       for="date">
                    Data
                </label>
                <div class="mt-2 flex justify-items-end">
                    <input class="block min-w-0 grow bg-gray-200 dark:bg-gray-800 rounded-md py-1.5 pr-3 pl-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"
                           name="date"
                           id="date"
                           type="date"
                           required
                           @if($update) value={{ old('date', $transaction->date) }} @endif
                    >
                </div>
            </div>

            <div class="col-span-full mt-6 flex items-center justify-center gap-x-6">
                <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    @if($update)
                        Editar
                    @else
                        Adicionar
                    @endif
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

<script src="https://unpkg.com/imask"></script>
<script>

let valueInput = document.getElementById('value');
let typeSelect = document.getElementById('type_id');
let categorySelect = document.getElementById('category_id');
let categoryOptions = categorySelect.options;

let mask = IMask(valueInput, {
    mask: [
        { mask: '' },
        {
            mask: 'R$ num',
            lazy: false,
            blocks: {
                num: {
                    mask: Number,  // enable number mask
                    // other options are optional with defaults below
                    scale: 2,  // digits after point, 0 for integers
                    thousandsSeparator: '.',  // any single char
                    padFractionalZeros: true,  // if true, then pads zeros at end to the length of scale
                    normalizeZeros: false,  // appends or removes zeros at ends
                    radix: ',',  // fractional delimiter
                    mapToRadix: '.',  // symbols to process as radix
                    // additional number interval options (e.g.)
                    signed: false,
                    min: 0.01,
                    autofix: true,
                }
            }
        },
    ]
});

mask.updateValue();


typeSelect.addEventListener('change', (event) => {
    let type = event.target.value;
    categorySelect.value = '';
    console.log(type);

    for (let i = 0; i < categoryOptions.length; i++) {
        let category = categoryOptions[i];
        console.log(category);
        category.disabled = true;

        if (category.value !== '') {
            if (type === category.text) {
                category.disabled = false;
            }
        }
    }
})

</script>
