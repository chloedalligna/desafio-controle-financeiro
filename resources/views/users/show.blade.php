<x-layout2 title="Verificação de e-mail">

    {{--    // Source - https://stackoverflow.com/a/17031201--}}
    {{--    // Posted by Josh Griggs--}}
    {{--    // Retrieved 2026-04-05, License - CC BY-SA 3.0--}}

    <h1 class="mt-10 text-center text-lg font-semibold tracking-tight text-white">
        Olá, {{ $username }}!
    </h1>

    <div class="">
    @if (!$user->is_premium)
        <h2>Assine já o Plano Premium! Clique no botão abaixo para saber mais.</h2>
        <div class="col-span-full mt-6 flex items-center justify-center gap-x-6">
            <form action="{{ route('subscription') }}" method="post" class="max-w-sm mx-auto">
                <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    <strong>Saiba mais sobre o Plano Premium</strong>
                </button>
            </form>
        </div>
    @else
        <h2>Você já é um cliente Premium!</h2>
    @endif
    </div>

    <div class="col-span-full mt-6 flex items-center justify-center gap-x-6">
        <form action="{{ route('payment') }}" method="post" class="max-w-sm mx-auto">
            <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                <strong>Assinar Plano Premium</strong>
            </button>
        </form>
    </div>

</x-layout2>
