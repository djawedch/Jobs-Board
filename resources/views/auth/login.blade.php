<x-layout>
    <x-page-heading>Log In</x-page-heading>

    <x-forms.form method="POST" action="{{ route('login') }}">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <x-forms.button class="w-full justify-center mt-6">
            Log In
        </x-forms.button>

        <x-forms.auth-link href="{{ route('register') }}" linkText="Register here">
            Don't have an account?
        </x-forms.auth-link>
    </x-forms.form>
</x-layout>