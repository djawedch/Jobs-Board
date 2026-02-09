<div class="space-y-2">
    <x-forms.label name="role" label="Register as:" />

    <div class="flex items-center gap-x-6">
        <div class="flex items-center gap-x-2">
            <input type="radio" id="candidate" name="role" value="candidate"
                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" {{ old('role', 'candidate') === 'candidate' ? 'checked' : '' }}>
            <label for="candidate" class="block text-sm font-medium leading-6 text-white">Candidate</label>
        </div>
        <div class="flex items-center gap-x-2">
            <input type="radio" id="employer" name="role" value="employer"
                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" {{ old('role', 'candidate') === 'employer' ? 'checked' : '' }}>
            <label for="employer" class="block text-sm font-medium leading-6 text-white">Employer</label>
        </div>
    </div>

    @error('role')
        <x-forms.error :error="$message" class="mt-2" />
    @enderror
</div>