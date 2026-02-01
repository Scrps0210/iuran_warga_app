<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} | TailAdmin - Laravel Tailwind CSS Admin Dashboard Template</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- CSS / Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                fontFamily: {
                    outfit: ['Outfit', 'sans-serif'],
                },
                extend: {
                    colors: {
                        current: 'currentColor',
                        transparent: 'transparent',
                        white: '#ffffff',
                        black: '#1c2434',
                        'brand': {
                            50: '#ecf3ff',
                            100: '#dde9ff',
                            500: '#465fff',
                            600: '#3641f5',
                        },
                        'boxdark': '#24303F',
                        'success': { 50: '#ecfdf3', 500: '#12b76a' },
                        'danger': { 50: '#fef3f2', 500: '#f04438' },
                        'warning': { 50: '#fffaeb', 500: '#f79009' },
                        'dark-bg': '#1a2231',
                        'dark-card': '#24303F',
                        'dark-border': '#344054',
                        'dark-text': '#ffffff',
                        'dark-text-secondary': '#98a2b3',
                    }
                }
            }
        }
    </script>

    <style type="text/tailwindcss">
        @layer base {
            body { @apply font-outfit text-base font-normal text-gray-700 bg-gray-50 dark:bg-gray-900 dark:text-gray-400; }
        }
        @layer components {
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

            /* Sidebar Menu Utilities (Ported from TailAdmin) */
            .menu-item { @apply relative flex items-center w-full gap-3 px-3 py-2 font-medium rounded-lg text-sm transition-colors; }
            .menu-item-active { @apply bg-brand-50 text-brand-500 dark:bg-brand-500/[0.12] dark:text-brand-400; }
            .menu-item-inactive { @apply text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5; }
            
            .menu-item-icon-active { @apply text-brand-500 dark:text-brand-400; }
            .menu-item-icon-inactive { @apply text-gray-500 dark:text-gray-400; }

            .menu-dropdown-item { @apply relative flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors; }
            .menu-dropdown-item-active { @apply bg-brand-50 text-brand-500 dark:bg-brand-500/[0.12] dark:text-brand-400; }
            .menu-dropdown-item-inactive { @apply text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5; }

            .menu-dropdown-badge { @apply text-success-600 dark:text-success-500 block rounded-full px-2.5 py-0.5 text-xs font-medium uppercase; }
            .menu-dropdown-badge-active { @apply bg-success-100 dark:bg-success-500/20; }
            .menu-dropdown-badge-inactive { @apply bg-success-50 dark:bg-success-500/15; }
        }
        [x-cloak] { display: none !important; }
    </style>

    <!-- Essential Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Theme Store (Original Logic) -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('theme', {
                init() {
                    const savedTheme = localStorage.getItem('theme');
                    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                    this.theme = savedTheme || systemTheme;
                    this.updateTheme();
                },
                theme: 'light',
                toggle() {
                    this.theme = this.theme === 'light' ? 'dark' : 'light';
                    localStorage.setItem('theme', this.theme);
                    this.updateTheme();
                },
                updateTheme() {
                    const html = document.documentElement;
                    const body = document.body;
                    if (this.theme === 'dark') {
                        html.classList.add('dark');
                        body.classList.add('dark', 'bg-gray-900');
                    } else {
                        html.classList.remove('dark');
                        body.classList.remove('dark', 'bg-gray-900');
                    }
                }
            });

            Alpine.store('sidebar', {
                isExpanded: window.innerWidth >= 1024,
                isMobileOpen: false,
                isHovered: false,
                toggleExpanded() { this.isExpanded = !this.isExpanded; this.isMobileOpen = false; },
                toggleMobileOpen() { this.isMobileOpen = !this.isMobileOpen; },
                setMobileOpen(val) { this.isMobileOpen = val; },
                setHovered(val) { if (window.innerWidth >= 1024 && !this.isExpanded) this.isHovered = val; }
            });
        });
    </script>
</head>

<body x-data="{ 'loaded': true }" x-init="$store.sidebar.isExpanded = window.innerWidth >= 1024;
    const checkMobile = () => {
        if (window.innerWidth < 1024) {
            $store.sidebar.setMobileOpen(false);
            $store.sidebar.isExpanded = false;
        } else {
            $store.sidebar.isMobileOpen = false;
            $store.sidebar.isExpanded = true;
        }
    };
    window.addEventListener('resize', checkMobile);
    setTimeout(() => { loaded = false }, 300);">

    {{-- Preloader (Only shown if loaded is true) --}}
    <div x-show="loaded" x-cloak
        class="fixed left-0 top-0 z-[999999] flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent">
        </div>
    </div>

    <div class="min-h-screen lg:flex">
        @include('layouts.backdrop')
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col min-w-0 transition-all duration-300 ease-in-out" :class="{
                'lg:ml-[290px]': $store.sidebar.isExpanded || $store.sidebar.isHovered,
                'lg:ml-[90px]': !$store.sidebar.isExpanded && !$store.sidebar.isHovered,
                'ml-0': $store.sidebar.isMobileOpen
             }">

            @include('layouts.app-header')

            <main class="flex-1 overflow-y-auto no-scrollbar">
                <div class="p-4 mx-auto max-w-7xl md:p-8 lg:p-12">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>