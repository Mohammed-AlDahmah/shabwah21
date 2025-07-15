<div class="bg-white shadow rounded p-6">
    <h2 class="text-lg font-bold mb-4">آخر الأنشطة</h2>
    <ul class="space-y-3">
        @forelse($activities as $activity)
            <li class="flex items-start space-x-2 rtl:space-x-reverse">
                <span class="text-primary">•</span>
                <div>
                    <p class="text-sm text-gray-700">{{ $activity->description }}</p>
                    <small class="text-gray-400">{{ $activity->created_at->diffForHumans() }} بواسطة {{ $activity->user->name ?? 'System' }}</small>
                </div>
            </li>
        @empty
            <li class="text-gray-500">لا توجد أنشطة بعد.</li>
        @endforelse
    </ul>
</div>