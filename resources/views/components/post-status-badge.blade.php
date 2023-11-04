@props(['status'])

@php
   $color = match ($status) {
         'active' => 'green' ,
         'draft' => 'gray',
         'passive' => 'red'
     }
@endphp

<x-rounded-badge :color="$color"> {{ ucwords($status) }} </x-rounded-badge>

