<x-layout title="Suas transações">

    <x-transactions.amounts :total="$total"
                            :incomes="$incomes"
                            :expenses="$expenses"
    />

    <x-table :collection="$transactions"
             :keys="['Tipo', 'Valor', 'Descrição', 'Categoria', 'Data']"
             edit="transactions.edit"
             action="transactions.destroy"
    />

</x-layout>
