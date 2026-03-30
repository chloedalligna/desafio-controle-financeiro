<x-layout title="Edite esta transação">

    <x-transactions.form
        :action="route('transactions.update', $transaction->id)"
        :update="true"
        :name="old('name')"
        :categories="$categories"
        :transaction="$transaction"
        :value="old('value')"
        :description="old('description')"
    />

</x-layout>
