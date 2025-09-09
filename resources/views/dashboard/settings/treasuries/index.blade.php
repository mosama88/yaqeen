@php
    use App\Livewire\Dashboard\TreasuryTable;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'الخزن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'الخزن',
        'PreviousPage' => 'لوحة التحكم',
        'UrlPreviousPage' => 'index',
        'currentPage' => 'الخزن',
    ])

    @include('dashboard.layouts.message')


    <div class="row my-3">
        <x-add-new-button-component url="treasuries.create"></x-add-new-button-component>


        @livewire(TreasuryTable::class)
    </div>




@endsection
