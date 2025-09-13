@php
    use App\Livewire\Dashboard\SalesMatrialTypeTable;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'بيانات فئات الفواتير')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'بيانات فئات الفواتير',
        'PreviousPage' => 'لوحة التحكم',
        'UrlPreviousPage' => 'index',
        'currentPage' => 'بيانات فئات الفواتير',
    ])

    @include('dashboard.layouts.message')


    <div class="row my-3">
        <x-add-new-button-component url="treasuries.create"></x-add-new-button-component>


        @livewire(SalesMatrialTypeTable::class)
    </div>




@endsection
