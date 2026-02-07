@props(['employer', 'width' => 90])

@if(isset($employer->logo) && $employer->logo)
    <img src="{{ asset('storage/' . $employer->logo) }}" 
         alt="{{ $employer->name }} logo" 
         class="rounded-xl"
         width="{{ $width }}">
@else
    <img src="https://picsum.photos/seed/{{ rand(0, 100000) }}/{{ $width }}" 
         alt="" 
         class="rounded-xl"
         width="{{ $width }}">
@endif