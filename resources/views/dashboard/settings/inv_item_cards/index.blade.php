@php
    use App\Livewire\Dashboard\InvItemCardTable;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'بيانات الاصناف')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'بيانات الاصناف',
        'PreviousPage' => 'لوحة التحكم',
        'UrlPreviousPage' => 'index',
        'currentPage' => 'بيانات الاصناف',
    ])

    @include('dashboard.layouts.message')


    <div class="row my-3">
        <x-add-new-button-component url="invItemCards.create"></x-add-new-button-component>


        @livewire(InvItemCardTable::class)
    </div>




@endsection
