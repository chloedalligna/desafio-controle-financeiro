<x-layout title="Adicione uma nova transação">

    <x-transactions.form
        :action="route('transactions.store')"
        :update="false"
        name="old('name')"
        :categories="$categories"
        :transaction="null"
        value="old('value')"
        description="old('description')"
    />

</x-layout>

