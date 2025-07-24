<div class="container py-5">
    <h2 class="text-3xl font-extrabold mb-8 text-[#B22B2B] flex items-center gap-2">
        <i class="bi bi-table text-2xl"></i>
        إدارة <span class="text-[#C08B2D]">الإعدادات في جدول</span>
    </h2>

    <!-- Search and Tabs Filter -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <div class="grid md:grid-cols-2 gap-4 items-end">
            <div>
                <label class="form-label font-bold text-[#B22B2B]">البحث</label>
                <input type="text" 
                       class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" 
                       wire:model.live="search" 
                       placeholder="ابحث في الإعدادات...">
            </div>
            <div>
                <div class="flex flex-wrap gap-2 justify-end">
                    <button type="button" wire:click="$set('filterCategory', 'all')" class="tab-btn-table {{ $filterCategory === 'all' ? 'active' : '' }}">
                        الكل
                    </button>
                    @foreach($categories as $key => $name)
                        <button type="button" wire:click="$set('filterCategory', '{{ $key }}')" class="tab-btn-table {{ $filterCategory === $key ? 'active' : '' }}">
                            {{ $name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white">
                    <tr>
                        <th class="px-6 py-4 text-right font-bold">الإعداد</th>
                        <th class="px-6 py-4 text-right font-bold">الوصف</th>
                        <th class="px-6 py-4 text-right font-bold">الفئة</th>
                        <th class="px-6 py-4 text-right font-bold">القيمة</th>
                        <th class="px-6 py-4 text-right font-bold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @php
                        $iconOptions = [
                            'bi bi-shield-check' => 'درع/مصداقية',
                            'bi bi-lightning' => 'سرعة',
                            'bi bi-eye' => 'شفافية',
                            'bi bi-newspaper' => 'جريدة/أخبار',
                            'bi bi-graph-up' => 'تحليل',
                            'bi bi-geo-alt' => 'موقع',
                            'bi bi-camera-video' => 'فيديو',
                            'bi bi-people' => 'أشخاص',
                            'bi bi-calendar-check' => 'تقويم',
                            'bi bi-person-badge' => 'مراسل',
                            'bi bi-facebook' => 'فيسبوك',
                            'bi bi-twitter-x' => 'تويتر',
                            'bi bi-instagram' => 'إنستغرام',
                            'bi bi-youtube' => 'يوتيوب',
                            'bi bi-telegram' => 'تليجرام',
                            'bi bi-whatsapp' => 'واتساب',
                        ];
                    @endphp
                    @forelse($filteredSettings as $setting)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">{{ $setting['label'] }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">{{ $setting['description'] }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $categories[$setting['category']] }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($editingSetting === $setting['key'])
                                    <!-- Edit Mode -->
                                    <div class="space-y-2">
                                        @if(str_contains($setting['key'], 'icon'))
                                            <select class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model="editingValue">
                                                <option value="">اختر أيقونة ...</option>
                                                @foreach($iconOptions as $iconClass => $iconLabel)
                                                    <option value="{{ $iconClass }}">{{ $iconLabel }}</option>
                                                @endforeach
                                            </select>
                                            @if($editingValue)
                                                <div class="mt-2 text-2xl"><i class="{{ $editingValue }}"></i></div>
                                            @endif
                                        @elseif($setting['type'] === 'textarea')
                                            <textarea 
                                                class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" 
                                                wire:model="editingValue" 
                                                rows="3"></textarea>
                                        @elseif($setting['type'] === 'boolean')
                                            <select class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" wire:model="editingValue">
                                                <option value="1">مفعل</option>
                                                <option value="0">معطل</option>
                                            </select>
                                        @else
                                            <input 
                                                type="{{ $setting['type'] }}" 
                                                class="form-control rounded-lg border-[#C08B2D] focus:ring-[#B22B2B]" 
                                                wire:model="editingValue">
                                        @endif
                                        <div class="flex gap-2">
                                            <button 
                                                class="btn btn-success btn-sm" 
                                                wire:click="saveSetting">
                                                <i class="bi bi-check"></i> حفظ
                                            </button>
                                            <button 
                                                class="btn btn-secondary btn-sm" 
                                                wire:click="cancelEdit">
                                                <i class="bi bi-x"></i> إلغاء
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <!-- Display Mode -->
                                    <div class="max-w-xs">
                                        @if(str_contains($setting['key'], 'icon') && $setting['value'])
                                            <span class="inline-flex items-center gap-2">
                                                <i class="{{ $setting['value'] }} text-xl"></i>
                                                <span class="text-xs text-gray-500">{{ $setting['value'] }}</span>
                                            </span>
                                        @elseif($setting['type'] === 'boolean')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $setting['value'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $setting['value'] ? 'مفعل' : 'معطل' }}
                                            </span>
                                        @elseif($setting['type'] === 'textarea')
                                            <div class="text-sm text-gray-600 truncate" title="{{ $setting['value'] }}">
                                                {{ Str::limit($setting['value'], 50) ?: 'غير محدد' }}
                                            </div>
                                        @elseif($setting['type'] === 'url' && $setting['value'])
                                            <a href="{{ $setting['value'] }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm truncate block">
                                                {{ Str::limit($setting['value'], 30) }}
                                            </a>
                                        @else
                                            <div class="text-sm text-gray-600 truncate" title="{{ $setting['value'] }}">
                                                {{ Str::limit($setting['value'], 30) ?: 'غير محدد' }}
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($editingSetting !== $setting['key'])
                                    <button 
                                        class="btn btn-primary btn-sm" 
                                        wire:click="editSetting('{{ $setting['key'] }}')">
                                        <i class="bi bi-pencil"></i> تعديل
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="bi bi-search text-4xl mb-2"></i>
                                    <p>لا توجد إعدادات تطابق البحث</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Statistics -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-lg p-4 shadow-md">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="bi bi-gear text-blue-600 text-xl"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm text-gray-600">إجمالي الإعدادات</p>
                    <p class="text-lg font-bold text-gray-900">{{ count($settings) }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg p-4 shadow-md">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="bi bi-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm text-gray-600">مفعلة</p>
                    <p class="text-lg font-bold text-gray-900">{{ collect($settings)->where('type', 'boolean')->where('value', true)->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg p-4 shadow-md">
            <div class="flex items-center">
                <div class="p-2 bg-red-100 rounded-lg">
                    <i class="bi bi-x-circle text-red-600 text-xl"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm text-gray-600">معطلة</p>
                    <p class="text-lg font-bold text-gray-900">{{ collect($settings)->where('type', 'boolean')->where('value', false)->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg p-4 shadow-md">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="bi bi-funnel text-purple-600 text-xl"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm text-gray-600">الفئات</p>
                    <p class="text-lg font-bold text-gray-900">{{ count($categories) }}</p>
                </div>
            </div>
        </div>
    </div>


<style>
.form-control {
    @apply w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-0;
}

.tab-btn-table {
    @apply px-4 py-2 rounded-lg font-semibold transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200;
}
.tab-btn-table.active {
    @apply bg-gradient-to-r from-[#C08B2D] to-[#B22B2B] text-white;
}

.btn {
    @apply inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200;
}

.btn-sm {
    @apply px-2 py-1 text-xs;
}

.btn-primary {
    @apply bg-[#C08B2D] text-white hover:bg-[#B22B2B] focus:ring-[#C08B2D];
}

.btn-success {
    @apply bg-green-600 text-white hover:bg-green-700 focus:ring-green-500;
}

.btn-secondary {
    @apply bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500;
}

.form-label {
    @apply block text-sm font-medium text-gray-700 mb-1;
}
</style>
</div>