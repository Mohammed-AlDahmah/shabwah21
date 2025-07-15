<header x-data="{ open:false }" class="bg-white shadow-md sticky top-0 z-50 border-b-4 border-primary">
    <!-- الشريط العلوي -->
    <div class="bg-gray-100 border-b border-gray-200">
        <div class="container mx-auto px-4 py-2">
            <div class="flex items-center justify-between text-sm text-gray-600">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        حضرموت، اليمن
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        {{ now()->format('Y-m-d') }}
                    </span>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="#" class="hover:text-red-600 transition-colors">تويتر</a>
                    <a href="#" class="hover:text-red-600 transition-colors">فيسبوك</a>
                    <a href="#" class="hover:text-red-600 transition-colors">يوتيوب</a>
                </div>
            </div>
        </div>
    </div>

    <!-- الهيدر الرئيسي -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- الشعار -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 space-x-reverse">
                    <img src="/images/logo.png" alt="حضرموت21" class="h-12 w-auto">
                    <div class="hidden md:block">
                        <h1 class="text-2xl font-bold text-gray-900">حضرموت21</h1>
                        <p class="text-sm text-gray-600">موقع إخباري شامل</p>
                    </div>
                </a>
            </div>

            <!-- القائمة الرئيسية -->
            <nav class="hidden lg:flex items-center space-x-6 space-x-reverse relative">
                <div class="absolute -bottom-4 left-0 w-full h-1 bg-primary rounded"></div>
                <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs('home') ? 'bg-primary text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">الرئيسية</a>
                @foreach($mainCategories as $cat)
                    @if($cat->children->count())
                        <div class="relative group">
                            <button class="px-3 py-2 rounded-lg font-medium flex items-center gap-1 transition-colors focus:outline-none {{ request('category') == $cat->slug ? 'bg-primary text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">
                                {{ $cat->name_ar ?? $cat->name }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg z-20 opacity-0 group-hover:opacity-100 transition-opacity border border-gray-100">
                                @foreach($cat->children as $child)
                                    <a href="{{ route('news.category', $child->slug) }}" class="block px-4 py-2 text-gray-700 hover:bg-primary hover:text-white transition-colors {{ request('category') == $child->slug ? 'bg-primary text-white' : '' }}">
                                        {{ $child->name_ar ?? $child->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ route('news.category', $cat->slug) }}" class="px-3 py-2 rounded-lg font-medium transition-colors {{ request('category') == $cat->slug ? 'bg-primary text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">
                            {{ $cat->name_ar ?? $cat->name }}
                        </a>
                    @endif
                @endforeach
                <a href="{{ route('videos.index') }}" class="px-3 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs('videos.index') ? 'bg-primary text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">فيديو</a>
            </nav>

            <!-- زر القائمة للموبايل -->
            <div class="lg:hidden">
                <button @click="open = !open" class="text-gray-700 hover:text-primary transition-colors focus:outline-none">
                    <svg x-show="!open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- قائمة الموبايل المنسدلة -->
    <nav x-show="open" x-transition.origin.top class="lg:hidden bg-white border-t border-gray-100 shadow-md">
        <ul class="flex flex-col py-4 px-4 space-y-2 font-bold">
            <li><a @click="open = false" href="{{ route('home') }}" class="block py-2 text-dark hover:text-primary">الرئيسية</a></li>
            @foreach($mainCategories as $cat)
                <li><a @click="open = false" href="{{ route('news.category', $cat->slug) }}" class="block py-2 text-dark hover:text-primary">{{ $cat->name_ar ?? $cat->name }}</a></li>
            @endforeach
            <li><a @click="open = false" href="{{ route('videos.index') }}" class="block py-2 text-dark hover:text-primary">فيديو</a></li>
        </ul>
    </nav>

    <!-- شريط البحث -->
    <div class="bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <div x-data="searchComponent()" class="flex items-center space-x-4 space-x-reverse">
                <div class="flex-1 relative">
                    <input x-model="query" @focus="open=true" @keydown.window.escape="open=false" @input.debounce.300="fetchResults" type="text" placeholder="ابحث في الأخبار..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                    <button @click="submit" class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <!-- Overlay suggestions -->
                    <template x-if="open && results.length">
                        <ul class="absolute z-50 left-0 right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg max-h-72 overflow-y-auto">
                            <template x-for="item in results" :key="item.id">
                                <li>
                                    <a :href="item.url" class="block px-4 py-2 hover:bg-gray-100 text-sm text-gray-700" @click="open=false" x-text="item.title"></a>
                                </li>
                            </template>
                        </ul>
                    </template>
                </div>
                <button @click="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition-colors font-medium">
                    بحث
                </button>
            </div>

            <script>
            function searchComponent(){
                return {
                    query:'',
                    open:false,
                    results:[],
                    fetchResults(){
                        if(this.query.length<2){this.results=[];return;}
                        fetch(`/search?q=${encodeURIComponent(this.query)}&json=1`).then(r=>r.json()).then(d=>{this.results=d;});
                    },
                    submit(){ if(this.query) window.location=`/search?q=${encodeURIComponent(this.query)}`; }
                }
            }
            </script>
        </div>
    </div>
</header>
