<x-layout>
    <x-page-heading>New Job</x-page-heading>
    
    <x-forms.form method="POST" action="{{ route('jobs.store') }}">
        <x-forms.input label="Title" name="title" placeholder="Web Developer" />
        <x-forms.input label="Salary" name="salary" placeholder="xxxxx" />
        <x-forms.input label="Location" name="location" placeholder="Florida" />

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="tag01, tag02, tag03" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>