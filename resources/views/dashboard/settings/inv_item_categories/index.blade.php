@php
    use App\Livewire\Dashboard\InvItemCategoryTable;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'فئات الاصناف')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'فئات الاصناف',
        'PreviousPage' => 'لوحة التحكم',
        'UrlPreviousPage' => 'index',
        'currentPage' => 'فئات الاصناف',
    ])

    @include('dashboard.layouts.message')


    <div class="row my-3">
        <x-add-new-button-component url="invItemCategory.create"></x-add-new-button-component>


        @livewire(InvItemCategoryTable::class)
    </div>




@endsection
