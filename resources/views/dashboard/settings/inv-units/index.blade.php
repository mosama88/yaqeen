@php
    use App\Livewire\Dashboard\InvUnitTable;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'الوحدات')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'الوحدات',
        'PreviousPage' => 'لوحة التحكم',
        'UrlPreviousPage' => 'index',
        'currentPage' => 'الوحدات',
    ])

    @include('dashboard.layouts.message')


    <div class="row my-3">
        <x-add-new-button-component url="invUnits.create"></x-add-new-button-component>


        @livewire(InvUnitTable::class)
    </div>




@endsection
