<x-layout title="Adicione uma nova transação">

    <x-transactions.form
        :action="route('transactions.store')"
        :update="false"
        :types="$types"
        :categories="$categories"
        :transaction="null"
    />

</x-layout>

