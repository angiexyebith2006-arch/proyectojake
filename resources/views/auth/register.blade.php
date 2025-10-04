<!-- Se extiende del layout de invitados (usuarios no autenticados) -->
<x-guest-layout>
    <!-- Tarjeta de autenticación personalizada de Jetstream -->
    <x-authentication-card>
        
        <!-- Slot para insertar el logo dentro de la tarjeta -->
        <x-slot name="logo">
            <!-- Logo de la aplicación centrado -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images\Logo.png')}}" alt="Logo" class="h-8 w-auto">
            </div>
        </x-slot>

        <!-- Muestra los errores de validación (si existen) -->
        <x-validation-errors class="mb-4" />

        <!-- Formulario de registro -->
        <form method="POST" action="{{ route('register') }}">
            @csrf <!-- Token CSRF para seguridad contra ataques -->

            <!-- Campo: Nombre del usuario -->
            <div>
                <x-label for="name" value="{{ __('Nombre') }}" />
                <x-input 
                    id="name" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus 
                    autocomplete="name" 
                />
            </div>

            <!-- Campo: Correo electrónico -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-input 
                    id="email" 
                    class="block mt-1 w-full" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autocomplete="username" 
                />
            </div>

            <!-- Campo: Contraseña -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input 
                    id="password" 
                    class="block mt-1 w-full" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password" 
                />
            </div>

            <!-- Campo: Confirmar contraseña -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-input 
                    id="password_confirmation" 
                    class="block mt-1 w-full" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                />
            </div>

            <!-- Sección opcional: aceptación de términos y política de privacidad -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                <!-- Texto dinámico con enlaces a Términos y Políticas -->
                                {!! __('Estoy de acuerdo con los :terms_of_service y :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Términos de Servicio').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Política de Privacidad').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Botón para enviar formulario + enlace para ir a login -->
            <div class="flex items-center justify-end mt-4">
                <!-- Link para redirigir al login si ya está registrado -->
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya estás registrado?') }}
                </a>

                <!-- Botón de registro -->
                <x-button class="ms-4">
                    {{ __('Registro') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
