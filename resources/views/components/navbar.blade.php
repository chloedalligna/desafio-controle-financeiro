@if(route('transactions.index'))
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
@elseif(route('categories.index'))
    <li>
        <a href="{{ route('transactions.create') }}" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">
            Adicionar categoria
        </a>
    </li>
    <li>
        <a href="{{ route('categories.index') }}" class="text-gray-300 transition font-semibold hover:text-gray-500/75" >
            Transações
        </a>
    </li>
@endif

