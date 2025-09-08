@extends('dashboard.layouts.master')
@section('title', 'إعدادت الشركة')
@section('content')

@include('dashboard.layouts.breadcrumb', [
    'titlePage' => 'إعدادت الشركة',
    'PreviousPage' => 'لوحة التحكم',
    'UrlPreviousPage' => 'dashboard.index',
    'currentPage' => 'إعدادت الشركة',
])

@endsection
