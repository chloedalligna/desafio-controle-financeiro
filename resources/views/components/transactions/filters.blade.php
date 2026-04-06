<div class="grid gap-6 m-4 sm:grid-cols-5 md:grid-cols-5 lg:grid-cols-5">
    <span>
        <p>Período</p>
        <span class="col-span-1 col-start-2 grid columns-1 p-4 text-center text-lg rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
            <select>
                @foreach($dates as $date)
                    <option value="{{ $date[0] }}-{{ $date[1] }}-{{ $date[2] }}">{{ $date[1] }}/{{ $date[0] }}</option>
                @endforeach
            </select>
        </span>
    </span>

    <span>
        <p>Entrada</p>
        <span class="col-span-1 col-start-3 grid columns-1 p-4 text-center text-lg rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
            <select>
                <option value="all">Todos</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </span>
    </span>

    <span>
        <p>Categoria</p>
        <span class="col-span-1 col-start-4 grid columns-1 p-4 text-center text-lg rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
            <select>
                <option value="all">Todos</option>
                @foreach($categories as $category)
                    <option label="{{ $category->name }}" value="{{ $category->id }}">{{ $category->type_id }}</option>
                @endforeach
            </select>
        </span>
    </span>
</div>
