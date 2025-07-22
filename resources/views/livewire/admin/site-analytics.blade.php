<div class="analytics-dashboard p-8 bg-gray-50 min-h-screen">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">لوحة إحصائيات الزوار</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="stat-card bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="stat-title text-gray-500 mb-2">إجمالي الزوار</div>
            <div class="stat-value text-3xl font-bold text-[#C08B2D]">{{ $totalVisitors }}</div>
        </div>
        <div class="stat-card bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="stat-title text-gray-500 mb-2">زوار اليوم</div>
            <div class="stat-value text-3xl font-bold text-[#B22B2B]">{{ $todayVisitors }}</div>
        </div>
        <div class="stat-card bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="stat-title text-gray-500 mb-2">أكثر الدول زيارة</div>
            <ul class="text-sm text-gray-700 mt-2">
                @forelse($topCountries as $country)
                    <li>{{ $country->country ?? 'غير محدد' }} <span class="text-xs text-gray-400">({{ $country->count }})</span></li>
                @empty
                    <li>لا يوجد بيانات</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-xl font-bold mb-4 text-gray-700">عدد الزيارات خلال آخر 30 يومًا</h2>
        <canvas id="visitsChart" height="100"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('visitsChart').getContext('2d');
            const data = {
                labels: {!! json_encode($visitsLast30Days->pluck('date')) !!},
                datasets: [{
                    label: 'عدد الزيارات',
                    data: {!! json_encode($visitsLast30Days->pluck('count')) !!},
                    backgroundColor: 'rgba(192, 139, 45, 0.2)',
                    borderColor: '#C08B2D',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                }]
            };
            new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: false }
                    },
                    scales: {
                        x: { title: { display: true, text: 'اليوم' } },
                        y: { title: { display: true, text: 'عدد الزيارات' }, beginAtZero: true }
                    }
                }
            });
        });
    </script>
</div>
