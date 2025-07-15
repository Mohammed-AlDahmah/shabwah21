@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('pageTitle', 'نظرة عامة')

@section('content')
    @livewire('admin.dashboard-stats')
@endsection