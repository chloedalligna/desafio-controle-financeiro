<x-layout title="Suas transações">

    <x-transactions.amounts :total="$total"
                            :incomes="$incomes"
                            :expenses="$expenses"
    />

    @if(empty($transactions))
        <h1 class="mt-10 text-center text-lg font-semibold tracking-tight text-white">
            Parece que você não tem nenhuma transação cadastrada... <br>
            Clique no botão <button class=""> "Adicionar transação" </button> e comece a administrar suas finanças!
        </h1
    @else
        <x-table :collection="$transactions"
                     :keys="['Tipo', 'Valor', 'Descrição', 'Categoria', 'Data']"
                     edit="transactions.edit"
                     action="transactions.destroy"
        />
    @endif

</x-layout>
