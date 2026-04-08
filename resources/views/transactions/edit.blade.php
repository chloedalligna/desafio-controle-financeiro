<x-layout title="Edite esta transação">

    <x-transactions.form
        :action="route('transactions.update', $transaction->id)"
        :update="true"
        :types="$types"
        :categories="$categories"
        :transaction="$transaction"
    />

</x-layout>
