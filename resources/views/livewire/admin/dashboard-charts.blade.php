<div class="bg-white shadow rounded p-6">
    <h2 class="text-lg font-bold mb-4">إحصائيات المقالات آخر 6 أشهر</h2>
    <canvas id="articlesChart" height="120"></canvas>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('articlesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($articlesChart['labels']),
                datasets: [{
                    label: 'عدد المقالات',
                    data: @json($articlesChart['data']),
                    backgroundColor: '#C08B2D',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>
@endpush