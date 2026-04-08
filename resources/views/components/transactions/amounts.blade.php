<div class="grid gap-6 m-4 sm:grid-cols-5 md:grid-cols-5 lg:grid-cols-5">
    <span class="col-span-1 col-start-2 grid columns-1 p-4 text-center text-lg rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
        <h1 class="font-semibold text-blue-500">Total</h1>
        <p class="font-bold text-blue-500">
            R$ {{ Number::format($total, 2, null, 'pt_BR') }}
        </p>
    </span>
    <span class="col-span-1 col-start-3 grid columns-1 p-4 text-center text-lg rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
        <h1 class="font-semibold text-green-500">Receita</h1>
        <p class="font-bold text-green-500">
            R$ {{ Number::format($incomes, 2, null, 'pt_BR') }}
        </p>
    </span>
    <span class="col-span-1 col-start-4 grid columns-1 p-4 text-center text-lg rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
        <h1 class="font-semibold text-red-500">Despesas</h1>
        <p class="font-bold text-red-500">
            R$ {{ Number::format($expenses, 2, null, 'pt_BR') }}
        </p>
    </span>
</div>
