@extends('layouts.main')

@section('title', 'News & Press Release')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGS News</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Noto Sans JP', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800 antialiased">

    {{--
        DATA DUMMY (MOCKUP DATA)
    --}}
    @php
        $specialArticles = [
            [
                'title' => 'SENSE OF WONDER NIGHT 2025',
                'image' => 'https://service.tgs.cesa.or.jp/images/96/ffa/bbad2474a6fe9defea4f359aede6a.png',
                'badge' => 'Pickup'
            ],
            [
                'title' => 'Notice of the "GAME with YOU" Donation',
                'image' => 'https://service.tgs.cesa.or.jp/images/96/346/cd441fc2ccb84dec80b14b5b4914b.jpg',
                'badge' => 'Pickup'
            ]
        ];

        $newsItems = [
            ['type' => 'News',    'date' => '2025/09/27', 'title' => 'TGS 2025 Official Supporter Kanata Hongo - Exclusive Behind-the-Scenes Video Released!'],
            ['type' => 'Release', 'date' => '2025/09/27', 'title' => 'At TGS2025, the gateway for indie game developers, the Grand Prize of Sense of Wonder Night 2025 was awarded to and Roger.'],
            ['type' => 'News',    'date' => '2025/09/17', 'title' => 'CESA\'s new donation project "GAME with YOU 募金"'],
            ['type' => 'News',    'date' => '2025/09/09', 'title' => 'Second wave of TGS BOOSTERZ announced'],
            ['type' => 'Release', 'date' => '2025/09/09', 'title' => 'Event stage and official program timetables also announced!'],
            ['type' => 'Release', 'date' => '2025/08/18', 'title' => 'TGS Forum – Organizer Session Information & Registration Opens August 18'],
            ['type' => 'Release', 'date' => '2025/08/18', 'title' => 'Pocky Appointed as Official Indie Game Ambassador!'],
            ['type' => 'Release', 'date' => '2025/08/18', 'title' => 'TGS2025 Announcing the 8 Finalists for Sense of Wonder Night 2025!'],
            ['type' => 'News',    'date' => '2025/08/01', 'title' => 'Third party provision of personal information to overseas exhibitors'],
            ['type' => 'News',    'date' => '2025/07/25', 'title' => 'Cosplay Area Revealed!'],
            ['type' => 'Release', 'date' => '2025/07/23', 'title' => 'General Influencer Registration Opens on Tuesday, August 5'],
            ['type' => 'Release', 'date' => '2025/07/23', 'title' => 'Learn and Play! Family Game Park Coming Soon!'],
            ['type' => 'News',    'date' => '2025/07/12', 'title' => 'General Ticket Sales Now Open (as of Jul. 12)'],
            ['type' => 'Release', 'date' => '2025/07/08', 'title' => 'TGS2025 Main Visual Revealed! General Public Day Admission Tickets Go on Sale July 12(Sat)!'],
            ['type' => 'Release', 'date' => '2025/07/08', 'title' => 'TGS2025 Exhibitor List Released!'],
            ['type' => 'News',    'date' => '2025/05/15', 'title' => 'Tokyo Game Show 2025 Teaser video released!'],
        ];
    @endphp

    {{-- KONTEN UTAMA --}}
    <div class="max-w-[1200px] mx-auto px-4 py-10 space-y-12">

        {{-- SECTION 1: SPECIAL ARTICLE --}}
        <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-1 h-6 bg-orange-400"></div>
                <h2 class="text-xl font-bold text-gray-900">Special Article</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($specialArticles as $article)
                <div class="bg-gray-100 rounded-2xl overflow-hidden flex shadow-sm hover:shadow-md transition group cursor-pointer h-48 md:h-56">
                    <div class="w-5/12 md:w-1/2 relative">
                        <img src="{{ $article['image'] }}" alt="Article" class="w-full h-full object-cover">
                    </div>
                    <div class="w-7/12 md:w-1/2 p-5 flex flex-col justify-between bg-white relative">
                        <div>
                            <span class="inline-block bg-[#75D959] text-white text-[10px] font-bold px-2 py-0.5 rounded mb-3">
                                {{ $article['badge'] }}
                            </span>
                            <h3 class="font-bold text-sm md:text-base leading-tight text-gray-900 line-clamp-3">
                                {{ $article['title'] }}
                            </h3>
                        </div>
                        <div class="flex justify-end mt-2">
                            <span class="bg-black text-white text-[10px] font-bold px-4 py-1.5 rounded-full flex items-center gap-1 group-hover:bg-orange-500 transition">
                                MORE <span class="text-[8px]">▶</span>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- SECTION 2: NEWS / PRESS RELEASE --}}
        <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-1 h-6 bg-orange-400"></div>
                <h2 class="text-xl font-bold text-gray-900">Berita / Siaran Pers</h2>
            </div>

            <div class="bg-[#F0F0F0] rounded-[30px] p-6 md:p-10">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($newsItems as $news)
                    <a href="#" class="bg-white rounded-xl p-5 flex flex-col justify-between min-h-[180px] hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer group relative">

                        <div>
                            <span class="inline-block text-[10px] font-bold px-2 py-1 rounded mb-3 text-white
                                {{ $news['type'] === 'Rilis' ? 'bg-orange-400' : 'bg-gray-500' }}">
                                {{ $news['type'] }}
                            </span>
                            <h3 class="text-[13px] font-bold text-gray-800 leading-snug line-clamp-4">
                                {{ $news['title'] }}
                            </h3>
                        </div>

                        <div class="flex justify-between items-end mt-4 border-t border-gray-100 pt-2">
                            <span class="text-[11px] text-gray-400 font-medium">{{ $news['date'] }}</span>

                            <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center group-hover:bg-orange-500 transition">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="flex justify-center items-center gap-3 mt-10">
                    <button class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-white hover:bg-gray-400 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    <button class="w-8 h-8 rounded-full bg-white text-gray-800 font-bold text-sm border border-gray-200 hover:border-orange-400 transition">1</button>
                    <button class="w-8 h-8 rounded-full bg-transparent text-gray-500 font-bold text-sm hover:text-orange-500 transition">2</button>
                    <button class="w-8 h-8 rounded-full bg-transparent text-gray-500 font-bold text-sm hover:text-orange-500 transition">3</button>
                    <span class="text-gray-400 text-sm">...</span>
                    <button class="w-8 h-8 rounded-full bg-transparent text-gray-500 font-bold text-sm hover:text-orange-500 transition">10</button>

                    <button class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-white hover:bg-gray-400 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

    </div>

    {{-- Footer Spacer --}}
    <div class="h-20"></div>

</body>
</html>

@endsection
