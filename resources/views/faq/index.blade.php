<x-app-layout>
    <x-slot name="header">
        Frequently Asked Questions
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($categories->isEmpty())
            <div class="elden-card p-12 text-center">
                <p class="text-slate-400 text-lg">No FAQ categories available yet.</p>
            </div>
        @else
            <div class="space-y-8">
                @foreach($categories as $category)
                    <div class="elden-card p-8">
                        <h2 class="text-3xl font-bold mb-3 elden-text-gold" style="font-family: 'Cinzel', serif;">
                            {{ $category->name }}
                        </h2>

                        @if($category->description)
                            <p class="text-slate-400 mb-6">
                                {{ $category->description }}
                            </p>
                        @endif

                        @if($category->faqs->isEmpty())
                            <p class="text-slate-500 italic">No questions in this category yet.</p>
                        @else
                            <div class="space-y-4">
                                @foreach($category->faqs as $faq)
                                    <div class="bg-slate-900/30 rounded-lg border border-amber-900/20 overflow-hidden">
                                        <details class="group">
                                            <summary class="cursor-pointer p-4 hover:bg-slate-800/50 transition-colors flex justify-between items-center">
                                                <h3 class="text-lg font-semibold text-amber-400 pr-4">
                                                    {{ $faq->question }}
                                                </h3>
                                                <svg class="w-5 h-5 text-amber-400 transform transition-transform group-open:rotate-180 flex-shrink-0"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 9l-7 7-7-7">
                                                    </path>
                                                </svg>
                                            </summary>
                                            <div class="p-4 pt-0 border-t border-amber-900/10">
                                                <p class="text-slate-300 leading-relaxed">
                                                    {!! nl2br(e($faq->answer)) !!}
                                                </p>
                                            </div>
                                        </details>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
