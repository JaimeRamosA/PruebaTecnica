<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="identificacion" value="{{ __('Identificacion') }}" />
                <x-jet-input id="identificacion" class="block mt-1 w-full" type="text" name="identificacion" :value="old('identificacion')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                <x-jet-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="pais" value="{{ __('Pais') }}" />
                <x-jet-input id="pais" class="block mt-1 w-full" type="text" name="pais" :value="old('pais')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <x-jet-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="ciudad" value="{{ __('Ciudad') }}" />
                <x-jet-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" required />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
