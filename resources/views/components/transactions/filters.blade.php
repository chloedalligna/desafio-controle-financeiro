    <div class="grid gap-6 m-4 grid-cols-7 text-gray-100">

        <span class="col-span-1 col-start-2">
            <label class="block text-sm/6 font-medium text-white"
                   for="period">
                        Período
            </label>
            <span class="grid columns-1 p-4 text-center text-md rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                <select id="period">
                    <option value="">Todos</option>
                    @foreach($dates as $date)
                        <option value="{{ $date[0] }}-{{ $date[1] }}">{{ $date[1] }}/{{ $date[0] }}</option>
                    @endforeach
                </select>
            </span>
        </span>

        <span class="col-span-1 col-start-3">
            <label class="block text-sm/6 font-medium text-white"
                   for="type_id">
                        Entrada
            </label>
            <span class="grid columns-1 p-4 text-center text-md rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                <select id="type_id">
                    <option value="">Todos</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </span>
        </span>

        <span class="col-span-1 col-start-4">
            <label class="block text-sm/6 font-medium text-white"
                   for="category_id">
                        Categoria
            </label>
            <span class="grid columns-1 p-4 text-center text-md rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                <select id="category_id">
                    <option value="">Todos</option>
                    @foreach($categories as $category)
                        <option label="{{ $category->name }}" value="{{ $category->id }}">{{ $category->type_id }}</option>
                    @endforeach
                </select>
            </span>
        </span>

        <span class="col-span-1 col-start-5 grid columns-1 text-center">
            <button type="button" onclick="filter()" class="self-end rounded-md bg-teal-600 p-4 text-md font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
               Aplicar filtros
            </button>
        </span>

        <span class="col-span-1 col-start-6 grid columns-1 text-center">
            <button type="button" onclick="cleanFilter()" class="self-end rounded-md bg-teal-600 p-4 text-md font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
               Limpar filtros
            </button>
        </span>

    </div>

<script>

    let typeSelect = document.getElementById('type_id');

    let categorySelect = document.getElementById('category_id');
    let categoryOptions = categorySelect.options;

    typeSelect.addEventListener('change', (event) => {
        let type = event.target.value;
        categorySelect.value = '';

        for (let i = 0; i < categoryOptions.length; i++) {
            let category = categoryOptions[i];
            category.disabled = false;

            if (category.value !== '') {
                if (type !== category.text) {
                    category.disabled = true;
                }
            }

            if (type === '') {
                category.disabled = false;
            }
        }
    });

    let dateSelect = document.getElementById('period');

    function removeSelectDuplicates(selectElement) {
        const options = selectElement.querySelectorAll('option');
        const seen = new Set();

        options.forEach(option => {
            if (seen.has(option.value)) {
                option.remove();
            } else {
                seen.add(option.value);
            }
        });
    }

    removeSelectDuplicates(dateSelect);

    function filter() {
        const urlParams = new URLSearchParams(window.location.search);

        urlParams.set('period', dateSelect.value);

        urlParams.set('type', typeSelect.value);

        urlParams.set('category', categorySelect.value);

        window.location.search = urlParams;
    }

    function cleanFilter() {
        const urlParams = new URLSearchParams(window.location.search);

        urlParams.delete('period');

        urlParams.delete('type');

        urlParams.delete('category');

        window.location.search = urlParams;
    }


</script>
