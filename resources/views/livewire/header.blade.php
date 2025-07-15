<header x-data="{ open:false }" class="bg-white shadow-lg sticky top-0 z-50 border-b-4 border-blue-600">
    <!-- Top Bar -->
    <div class="bg-slate-900 text-gray-200 border-b border-slate-700">
        <div class="container mx-auto px-4 py-2">
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="flex items-center">
                        <i class="bi bi-geo-alt-fill text-blue-400 ml-1"></i>
                        حضرموت، اليمن
                    </span>
                    <span class="flex items-center">
                        <i class="bi bi-clock text-blue-400 ml-1"></i>
                        {{ now()->format('Y-m-d') }}
                    </span>
                    <span class="flex items-center">
                        <i class="bi bi-thermometer-half text-blue-400 ml-1"></i>
                        28°C
                    </span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors" aria-label="Twitter">
                        <i class="bi bi-twitter-x text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors" aria-label="Facebook">
                        <i class="bi bi-facebook text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors" aria-label="YouTube">
                        <i class="bi bi-youtube text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors" aria-label="Telegram">
                        <i class="bi bi-telegram text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="container mx-auto px-4 py-4 bg-white">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 space-x-reverse">
                    <div class="relative">
                        <img src="/images/logo.png" alt="شبوة21" class="h-14 w-auto">
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full animate-pulse"></div>
                    </div>
                    <div class="hidden md:block">
                        <h1 class="text-3xl font-bold text-slate-800">شبوة<span class="text-blue-600">21</span></h1>
                        <p class="text-sm text-slate-600">منبرك الأول والخبر</p>
                    </div>
                </a>
            </div>

            <!-- Main Navigation -->
            <nav class="hidden lg:flex items-center space-x-6 space-x-reverse">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-slate-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50 font-semibold' : '' }}">الرئيسية</a>
                @foreach($mainCategories as $cat)
                    @if($cat->children->count())
                        <div class="relative group">
                            <button class="px-4 py-2 rounded-lg font-medium flex items-center gap-1 transition-all duration-300 focus:outline-none text-slate-700 hover:text-blue-600 hover:bg-blue-50 {{ request('category') == $cat->slug ? 'text-blue-600 bg-blue-50 font-semibold' : '' }}">
                                {{ $cat->name_ar ?? $cat->name }}
                                <i class="bi bi-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-xl z-20 opacity-0 group-hover:opacity-100 transition-all duration-300 border border-slate-200 transform scale-95 group-hover:scale-100">
                                @foreach($cat->children as $child)
                                    <a href="{{ route('news.category', $child->slug) }}" class="block px-4 py-3 text-slate-700 hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request('category') == $child->slug ? 'bg-blue-50 text-blue-600' : '' }}">
                                        {{ $child->name_ar ?? $child->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ route('news.category', $cat->slug) }}" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-slate-700 hover:text-blue-600 hover:bg-blue-50 {{ request('category') == $cat->slug ? 'text-blue-600 bg-blue-50 font-semibold' : '' }}">
                            {{ $cat->name_ar ?? $cat->name }}
                        </a>
                    @endif
                @endforeach
                <a href="{{ route('videos.index') }}" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-slate-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('videos.index') ? 'text-blue-600 bg-blue-50 font-semibold' : '' }}">فيديو</a>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button @click="open = !open" class="text-slate-700 hover:text-blue-600 transition-colors focus:outline-none p-2">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <nav x-show="open" x-transition.origin.top class="lg:hidden bg-white border-t border-slate-200 shadow-lg">
        <div class="px-4 py-4 space-y-2">
            <a @click="open = false" href="{{ route('home') }}" class="block py-3 px-4 text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors font-medium">الرئيسية</a>
            @foreach($mainCategories as $cat)
                <a @click="open = false" href="{{ route('news.category', $cat->slug) }}" class="block py-3 px-4 text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors font-medium">{{ $cat->name_ar ?? $cat->name }}</a>
            @endforeach
            <a @click="open = false" href="{{ route('videos.index') }}" class="block py-3 px-4 text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors font-medium">فيديو</a>
        </div>
    </nav>

    <!-- Search Bar -->
    <div class="bg-slate-50 border-t border-slate-200">
        <div class="container mx-auto px-4 py-4">
            <div x-data="searchComponent()" class="flex items-center space-x-4 space-x-reverse">
                <div class="flex-1 relative">
                    <input x-model="query" @focus="open=true" @keydown.window.escape="open=false" @input.debounce.300="fetchResults" 
                           type="text" placeholder="ابحث في الأخبار والتقارير..." 
                           class="w-full px-6 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-700 placeholder-slate-500">
                    <button @click="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-blue-600 transition-colors">
                        <i class="bi bi-search text-lg"></i>
                    </button>

                    <!-- Search Suggestions -->
                    <template x-if="open && results.length">
                        <ul class="absolute z-50 left-0 right-0 mt-2 bg-white border border-slate-200 rounded-xl shadow-xl max-h-80 overflow-y-auto">
                            <template x-for="item in results" :key="item.id">
                                <li>
                                    <a :href="item.url" class="block px-6 py-3 hover:bg-slate-50 text-sm text-slate-700 border-b border-slate-100 last:border-b-0" @click="open=false" x-text="item.title"></a>
                                </li>
                            </template>
                        </ul>
                    </template>
                </div>
                <button @click="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl transition-all duration-300 font-semibold flex items-center gap-2">
                    <i class="bi bi-search"></i>
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