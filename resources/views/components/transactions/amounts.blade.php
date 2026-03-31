<div class="grid gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3">
    <span class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <h1 class="text-sm font-medium text-blue-500">Total</h1>
        R$ {{ Number::format($total, 2, null, 'pt_BR') }}
    </span>
    <span class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <h1 class="text-sm font-medium text-green-500">Receita</h1>
        R$ {{ Number::format($incomes, 2, null, 'pt_BR') }}
    </span>
    <span class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <h1 class="text-sm font-medium text-red-500">Despesas</h1>
        R$ {{ Number::format($expenses, 2, null, 'pt_BR') }}
    </span>
</div>
