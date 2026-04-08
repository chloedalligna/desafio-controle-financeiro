<x-layout2 title="Assinatura do Plano Premium">

    <div class="col-span-full mt-6 flex items-center justify-center gap-x-6">
        @if($user->is_premium === 1)
            <a href="{{ route('subscription.cancel', $user->id) }}" class="max-w-sm mx-auto">
                <button type="submit" class="rounded-md bg-gray-800 px-3 py-2 text-lg font-semibold text-white hover:bg-gray-600">
                    Cancelar Plano Premium
                </button>
            </a>
        @else
            <a href="{{ route('payment') }}" class="max-w-sm mx-auto">
                <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 text-lg font-semibold text-white hover:bg-teal-500">
                    Assinar Plano Premium
                </button>
            </a>
        @endif
    </div>

</x-layout2>
