<div class="w-full flex justify-center mx-2 {{ $visibility ? '' : 'hidden' }}">

    <a href="/auth/{{ $provider }}/redirect" {{ $attributes->merge([
            'class' => 'text-white mb-2 me-2 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center'
            ])
     }}>
        {{ $slot }}
    </a>
</div>