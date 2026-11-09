@extends('layouts.app')
@section('title', $post->title . ' - Barangay Bulletin')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-emerald-300 hover:text-white transition">
        &larr; Back to all announcements
    </a>

    <article class="bg-white border border-emerald-100 rounded-2xl shadow-xl p-6 sm:p-8 space-y-5">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-emerald-50 pb-4">
            <span class="text-xs font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">
                {{ $post->category }}
            </span>
            @if ($post->is_pinned)
                <span class="text-xs font-bold px-3 py-1 rounded-full bg-amber-100 text-amber-900 border border-amber-300">
                    📌 Pinned Bulletin
                </span>
            @endif
        </div>

        <h1 class="text-2xl sm:text-3xl font-black text-emerald-950 tracking-tight leading-tight">
            {{ $post->title }}
        </h1>

        <div class="flex items-center gap-4 text-xs font-mono text-emerald-600/80">
            <span>Author ID: {{ $post->author_id }}</span>
            <span>&middot;</span>
            <span>Published: {{ $post->published_at ? $post->published_at->format('F d, Y h:i A') : 'N/A' }}</span>
            <span>&middot;</span>
            <span>Views: {{ $post->views }}</span>
        </div>

        <div class="prose max-w-none text-emerald-950 leading-relaxed text-sm sm:text-base border-t border-emerald-50 pt-5">
            {!! nl2br(e($post->body)) !!}
        </div>
    </article>
</div>
@endsection