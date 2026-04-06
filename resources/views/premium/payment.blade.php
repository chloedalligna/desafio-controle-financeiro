<x-layout2 title="Pagamento do Plano Premium">

    <div class="w-full mt-10 text-center text-lg font-semibold flex items-center justify-center gap-x-6">
        <div>
            <a href="{{ route('premium', session('user_id')) }}" class="max-w-sm mx-auto">
                <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 font-semibold text-white hover:bg-teal-500">
                    Realizar pagamento
                </button>
            </a>
        </div>
        <div>
            <a href="{{ route('transactions.index') }}" class="max-w-sm mx-auto">
                <button type="submit" class="rounded-md bg-gray-800 px-3 py-2 font-semibold text-white hover:bg-gray-600">
                    Cancelar
                </button>
            </a>
        </div>
    </div>

</x-layout2>
