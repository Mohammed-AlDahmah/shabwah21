@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('pageTitle', 'نظرة عامة')

@section('content')
    @livewire('admin.dashboard-stats')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
        @livewire('admin.dashboard-charts')
        @livewire('admin.recent-activities')
    </div>
@endsection