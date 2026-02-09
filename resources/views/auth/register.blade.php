<x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        <x-forms.input label="Name" name="name" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

        <x-forms.radio-group />

        <div id="employerFields" class="space-y-6 mt-6 hidden">
            <x-forms.divider />
            <x-forms.input label="Company Name" name="employer" />
            <x-forms.input label="Company Logo" name="logo" type="file" />
        </div>

        <x-forms.button class="w-full justify-center mt-6">Create Account</x-forms.button>

        <x-forms.auth-link href="{{ route('login') }}" linkText="Log in here">
            Already have an account?
        </x-forms.auth-link>
    </x-forms.form>
</x-layout>