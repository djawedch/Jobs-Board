<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="PATCH" action="{{ route('jobs.update', $job) }}">

        <x-forms.input label="Title" name="title" :value="old('title', $job->title)" />
        <x-forms.input label="Salary" name="salary" :value="old('salary', $job->salary)" />
        <x-forms.input label="Location" name="location" :value="old('location', $job->location)" />

        <x-forms.select label="Schedule" name="schedule">
            <option value="Part Time" @selected(old('schedule', $job->schedule) === 'Part Time')>Part Time</option>
            <option value="Full Time" @selected(old('schedule', $job->schedule) === 'Full Time')>Full Time</option>
        </x-forms.select>

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" :value="old('tags', $job->tags->pluck('name')->join(', '))" />

        <x-forms.button>Update Job</x-forms.button>
    </x-forms.form>
</x-layout>
