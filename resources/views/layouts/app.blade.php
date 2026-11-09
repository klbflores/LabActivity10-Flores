<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Barangay Bulletin: Purok Flores')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        nav[role="navigation"] svg {
            width: 1.25rem;
            height: 1.25rem;
            display: inline-block;
        }

        nav[role="navigation"] a,
        nav[role="navigation"] span {
            border-radius: 0.5rem !important;
            margin: 0 0.15rem !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            transition: all 0.15s ease-in-out !important;
        }

        nav[role="navigation"] a {
            background-color: #ffffff !important;
            border: 1px solid #a7f3d0 !important;
            color: #064e3b !important;
        }

        nav[role="navigation"] a:hover {
            background-color: #ecfdf5 !important;
            border-color: #059669 !important;
            color: #047857 !important;
        }

        nav[role="navigation"] span[aria-current="page"] > span {
            background-color: #047857 !important;
            color: #ffffff !important;
            border: 1px solid #047857 !important;
        }

        nav[role="navigation"] span[aria-disabled="true"] span,
        nav[role="navigation"] span[aria-disabled="true"] {
            background-color: #f1f5f9 !important;
            border: 1px solid #cbd5e1 !important;
            color: #94a3b8 !important;
            cursor: not-allowed !important;
        }
    </style>
</head>
<body class="bg-emerald-950 text-slate-100 antialiased min-h-screen flex flex-col justify-between">
    <header class="bg-emerald-900/90 backdrop-blur-sm border-b border-emerald-800 shadow-md sticky top-0 z-20">
        <div class="max-w-6xl mx-auto px-4 py-4 flex flex-col sm:flex-row justify-between items-center gap-3">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-sm shadow-sm">
                    BB
                </div>
                <div>
                    <a href="{{ route('posts.index') }}" class="text-xl font-black text-white tracking-tight hover:text-emerald-200 transition">
                        Barangay Bulletin: Purok Flores
                    </a>
                </div>
            </div>
            <span class="text-xs font-mono font-semibold bg-emerald-950 text-emerald-300 border border-emerald-700 px-3 py-1 rounded-full">
                Official Public Feed
            </span>
        </div>
    </header>

    <main class="max-w-6xl w-full mx-auto px-4 py-8 flex-1">
        @yield('content')
    </main>

    <footer class="bg-emerald-900/60 border-t border-emerald-800 py-6 text-center text-xs text-emerald-300/80">
        &copy; 2026 Barangay Bulletin &middot; Purok Flores, Matina Crossing, Davao City
    </footer>
</body>
</html>