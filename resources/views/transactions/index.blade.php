<x-layout title="Suas transações">

    <x-table :collection="$transactions"
             :keys="['Nome', 'Categoria', 'Valor', 'Descrição', 'Data de criação', 'Data da última atualização']"
             edit="transactions.edit"
             action="transactions.destroy" />

</x-layout>
