<x-layout2 title="Verificação de e-mail">

    <div class="col-span-full mt-10 text-center text-lg font-semibold flex items-center justify-center gap-x-6">
        <form action="{{ route('users.show') }}" method="post" class="max-w-sm mx-auto">
            <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                <strong>Realizar pagamento</strong>
            </button>
        </form>
    </div>

</x-layout2>
