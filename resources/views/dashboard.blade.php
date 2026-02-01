@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <div class="col-span-12 space-y-6 xl:col-span-12">
            {{-- Metrics Section --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 md:gap-6">
                <!-- Card Item: Total Warga -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Total Warga</span>
                            <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">{{ $wargaCount }}</h4>
                        </div>
                    </div>
                </div>

                <!-- Card Item: Total Iuran -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Revenue</span>
                            <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">Rp
                                {{ number_format($totalIuran ?? 0, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- Card Item: Pending -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Dues (Lunas)</span>
                            <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                                {{ number_format($totalWargaAktif) }}</h4>
                        </div>
                    </div>
                </div>

                <!-- Card Item: Active -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Active Residents</span>
                            <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">{{ $totalWargaAktif }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Chart --}}
        <div class="col-span-12 xl:col-span-7">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between sm:px-7.5 sm:py-5">
                    <h4 class="text-xl font-bold text-gray-800 dark:text-white">Monthly Revenue</h4>
                    <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-5 sm:p-7.5">
                    <div id="chartOne" class="-ml-5"></div>
                </div>
            </div>
        </div>

        {{-- Side Chart / Demographic --}}
        <div class="col-span-12 xl:col-span-5">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between sm:px-7.5 sm:py-5">
                    <h4 class="text-xl font-bold text-gray-800 dark:text-white">Stats Overview</h4>
                    <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-5 sm:p-7.5">
                    <div id="chartTwo"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const chartOneOptions = {
                series: [{
                    name: "Revenue",
                    data: @json($monthlyData)
                }],
                colors: ["#465fff"],
                chart: {
                    fontFamily: "Outfit, sans-serif",
                    type: "area",
                    height: 350,
                    toolbar: { show: false },
                },
                stroke: { curve: 'smooth', width: 2 },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.2,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                },
            };

            const chartOne = new ApexCharts(document.querySelector("#chartOne"), chartOneOptions);
            chartOne.render();

            const chartTwoOptions = {
                series: [{{ $totalIuran }}, {{ $totalIuranBelumLunas }}],
                labels: ["Lunas", "Belum Lunas"],
                colors: ["#465fff", "#f04438"],
                chart: { type: "donut", fontFamily: "Outfit, sans-serif", height: 350 },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "75%",
                            labels: {
                                show: true,
                                name: {
                                    show: true
                                },
                                value: {
                                    show: true,
                                    fontSize: "20px",
                                    fontFamily: "Outfit",
                                    fontWeight: 500,
                                    formatter: function(val) {
                                        return parseInt(val).toLocaleString('id-ID');
                                    }
                                },
                                total: {
                                    show: true,
                                    label: "Total",
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0).toLocaleString('id-ID');
                                    }
                                }
                            }
                        }
                    }
                },
            };

            const chartTwo = new ApexCharts(document.querySelector("#chartTwo"), chartTwoOptions);
            chartTwo.render();
        });
    </script>
@endpush