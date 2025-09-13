@php
    use App\Livewire\Dashboard\StoreTable;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'المخازن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'المخازن',
        'PreviousPage' => 'لوحة التحكم',
        'UrlPreviousPage' => 'index',
        'currentPage' => 'المخازن',
    ])

    @include('dashboard.layouts.message')


    <div class="row my-3">
        <x-add-new-button-component url="stores.create"></x-add-new-button-component>


        @livewire(StoreTable::class)
    </div>




@endsection
