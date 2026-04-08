<x-layout title="Suas transações" :msg="$msg">

    <x-transactions.filters :dates="$dates"
                            :types="$types"
                            :categories="$categories"
    />

    <x-transactions.amounts :total="$total"
                            :incomes="$incomes"
                            :expenses="$expenses"
    />

    @if(($total === 0.00) && ($query === null))
        <h1 class="mt-10 text-center text-lg font-semibold tracking-tight text-white">
            Parece que você não tem nenhuma transação cadastrada...
            <br><br>
            Clique no botão <a href="{{ route('transactions.create') }}" class="rounded-md bg-teal-600 m-2 px-3 py-2 text-md font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">Adicionar transação</a> e comece a administrar suas finanças!
            <br><br><br>
            Importante!
            <br><br>
            Caso não tenha criado nenhuma categoria, clique em <a href="{{ route('categories.index') }}" class="text-md text-gray-300 rounded-md m-2 px-3 py-2 transition font-semibold hover:text-gray-500/75" >Categorias</a> para categorizar suas finanças!
        </h1>
    @else
        <x-transactions.table :collection="$transactions"
                     :keys="['Tipo', 'Valor', 'Descrição', 'Categoria', 'Data']"
                     edit="transactions.edit"
        />
    @endif

</x-layout>
