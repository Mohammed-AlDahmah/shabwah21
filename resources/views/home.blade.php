@extends('layouts.app')

@section('title', 'شبوة21 - موقع إخباري احترافي')
@section('description', 'موقع شبوة21 الإخباري - آخر الأخبار والتقارير من حضرموت واليمن')
@section('keywords', 'أخبار, حضرموت, اليمن, إخبارية')

@section('content')
    <livewire:homepage />
@endsection

@push('styles')
<style>
    /* Custom styles for homepage */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(135deg, #C08B2D 0%, #B22B2B 100%);
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(192, 139, 45, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(192, 139, 45, 0.4);
        color: white;
    }

    .section-header {
        position: relative;
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #C08B2D, #B22B2B);
        border-radius: 2px;
    }

    /* Hover effects for news cards */
    .news-card-small a:hover h4 {
        color: #C08B2D;
        transition: color 0.3s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 0;
        }
        
        .section-header {
            text-align: center;
        }
        
        .section-header::after {
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>
@endpush
 