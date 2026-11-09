@extends('layouts.app')
@section('title', 'Barangay Bulletin: Purok Flores')

@section('content')
<div class="space-y-6">
    <div class="border-b border-emerald-800 pb-4">
        <h1 class="text-3xl font-black text-white tracking-tight">Community Announcements</h1>
        <p class="text-sm font-medium text-emerald-200 mt-1">Updates, health drives, and notices for Purok Flores residents.</p>
    </div>

    <form method="GET" action="{{ route('posts.index') }}" class="bg-white p-4 rounded-2xl border border-emerald-100 shadow-lg flex flex-col sm:flex-row gap-3">
        <div class="flex-1">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search announcement title..." 
                   class="w-full px-3.5 py-2.5 text-sm border border-emerald-200 rounded-xl text-[#3b4e47] placeholder-[#6b7f77] focus:text-[#283832] focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
        </div>
        <div class="w-full sm:w-56">
            <select name="category" class="w-full px-3.5 py-2.5 text-sm border border-emerald-200 rounded-xl text-emerald-950 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-5 py-2.5 bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-bold rounded-xl transition shadow-xs cursor-pointer">
                Filter
            </button>
            @if(request('q') || request('category'))
                <a href="{{ route('posts.index') }}" class="px-4 py-2.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 text-sm font-semibold rounded-xl border border-emerald-200 transition">
                    Clear
                </a>
            @endif
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($posts as $post)
            <article class="bg-white rounded-2xl border {{ $post->is_pinned ? 'border-amber-400 ring-4 ring-amber-400/30' : 'border-emerald-100' }} shadow-md p-5 flex flex-col justify-between transition hover:-translate-y-1">
                <div>
                    <div class="flex items-center justify-between gap-2 mb-3">
                        <span class="text-xs font-bold px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">
                            {{ $post->category }}
                        </span>
                        @if ($post->is_pinned)
                            <span class="text-xs font-bold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-900 border border-amber-300">
                                📌 Pinned
                            </span>
                        @endif
                    </div>
                    <h2 class="text-lg font-bold text-emerald-950 hover:text-emerald-700 transition leading-snug">
                        <a href="{{ route('posts.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-emerald-900/80 text-sm mt-2 line-clamp-3 leading-relaxed">
                        {{ $post->body }}
                    </p>
                </div>

                <div class="mt-4 pt-3 border-t border-emerald-100 flex items-center justify-between text-xs text-emerald-700 font-mono">
                    <span>Author #{{ $post->author_id }} &middot; {{ $post->views }} views</span>
                    <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}</span>
                </div>
            </article>
        @empty
            <div class="col-span-full bg-emerald-900/50 p-10 rounded-2xl border border-dashed border-emerald-700 text-center text-emerald-200 font-medium">
                <p>No posts match your search.</p>
            </div>
        @endforelse
    </div>

    <div class="bg-white p-4 rounded-2xl border border-emerald-100 shadow-md flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-xs font-semibold text-emerald-800 font-mono">
            Showing <span class="font-bold text-emerald-950">{{ $posts->firstItem() ?? 0 }}</span> &ndash; <span class="font-bold text-emerald-950">{{ $posts->lastItem() ?? 0 }}</span> of <span class="font-bold text-emerald-950">{{ $posts->total() }}</span> posts
        </p>
        <div class="pagination-wrapper">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection