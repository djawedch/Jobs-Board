<x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="/register" enctype="multipart/form-data">
        <x-forms.input label="Name" name="name" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

        <x-forms.form-group>
            <x-forms.label name="role" label="Register as:" />
            <div class="flex items-center gap-x-6">
                <div class="flex items-center gap-x-2">
                    <input type="radio" id="candidate" name="role" value="candidate" checked
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="candidate" class="block text-sm font-medium leading-6 text-white">Candidate</label>
                </div>
                <div class="flex items-center gap-x-2">
                    <input type="radio" id="employer" name="role" value="employer"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="employer" class="block text-sm font-medium leading-6 text-white">Employer</label>
                </div>
            </div>
        </x-forms.form-group>

        <div id="employerFields" style="display: none;" class="space-y-6 mt-6">
            <x-forms.divider />
            <x-forms.input label="Employer Name" name="employer" />
            <x-forms.input label="Employer Logo" name="logo" type="file" />
        </div>

        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
</x-layout>