<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembina</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        #donutChart {
            width: 300px;
            height: 300px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        @include('layouts.sidebarp') 
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="relative mb-6">
                <img src="{{ asset('img/orangwelcome.png') }}" alt="Illustration of a person waving" class="absolute -top-12 right-0 w-60 h-40">
                <div class="bg-gradient-to-t from-[#1B7691] to-[#10BCEF] text-white p-10 rounded-md flex items-center mb-6 mt-8">
                    <h2 class="text-2xl font-bold">Selamat datang, {{ $user->nama }}!</h2>
                </div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-4 text-center">Statistik Pendaftar Berdasarkan Status</h3>
                    <canvas id="barChart"></canvas>
                </div>
                <div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                            <p class="text-4xl text-blue-600 font-bold mb-2">{{ $totalPendaftar }}</p>
                            <p class="text-gray-600 font-medium">Total Pendaftar</p>
                        </div>
                        <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                            <p class="text-4xl text-yellow-500 font-bold mb-2">{{ $menunggu }}</p>
                            <p class="text-gray-600 font-medium">Menunggu</p>
                            <p class="text-sm text-yellow-700 font-semibold">{{ number_format($persenMenunggu, 1) }}%</p>
                        </div>
                        <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                            <p class="text-4xl text-green-500 font-bold mb-2">{{ $diterima }}</p>
                            <p class="text-gray-600 font-medium">Diterima</p>
                            <p class="text-sm text-green-700 font-semibold">{{ number_format($persenDiterima, 1) }}%</p>
                        </div>
                        <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                            <p class="text-4xl text-red-500 font-bold mb-2">{{ $ditolak }}</p>
                            <p class="text-gray-600 font-medium">Ditolak</p>
                            <p class="text-sm text-red-700 font-semibold">{{ number_format($persenDitolak, 1) }}%</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <!-- <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                        <p class="text-4xl text-blue-600 font-bold mb-2">{{ $totalBidang }}</p>
                        <p class="text-gray-600 font-medium">Total Pendaftar</p>
                    </div> -->
                    @foreach($bidangCounts as $bidang => $jumlah)
                        <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                            <p class="text-4xl text-blue-600 font-bold mb-2">{{ $jumlah }}</p>
                            <p class="text-gray-600 font-medium">{{ $bidang }}</p>
                            <p class="text-sm text-blue-700 font-semibold">
                                {{ number_format(($jumlah / $totalBidang) * 100, 1) }}%
                            </p>
                        </div>
                    @endforeach
                </div>
                @if ($totalPendaftar > 0)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-4 text-center">Statistik Pendaftar Berdasarkan Bidang</h3>
                    <div class="flex flex-col items-center">
                        <canvas id="donutChart" class="mb-4"></canvas>
                    </div>
                </div>
                @endif
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Data untuk Diagram Batang
                const barData = {
                    labels: ['Menunggu', 'Diterima', 'Ditolak'],
                    datasets: [{
                        label: 'Jumlah Pendaftar',
                        data: [{{ $menunggu }}, {{ $diterima }}, {{ $ditolak }}],
                        backgroundColor: ['#FBBF24', '#10B981', '#EF4444'], // Warna untuk tiap status
                    }]
                };

                const barConfig = {
                    type: 'bar',
                    data: barData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            x: { grid: { display: false } },
                            y: {
                                grid: { display: false },
                                ticks: { precision: 0 }
                            }
                        }
                    }
                };

                // Render Diagram Batang
                const barChart = new Chart(
                    document.getElementById('barChart'),
                    barConfig
                );

                // Data untuk Diagram Donat
                const donutData = {
                    labels: Object.keys({!! json_encode($bidangCounts) !!}),
                    datasets: [{
                        label: 'Pendaftar',
                        data: Object.values({!! json_encode($bidangCounts) !!}),
                        backgroundColor: [
                            '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#6366F1'
                        ]
                    }]
                };

                const donutConfig = {
                    type: 'doughnut',
                    data: donutData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { 
                                position: 'bottom',
                                align: 'start'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const value = context.parsed;
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${context.label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                };

                // Render Diagram Donat
                const donutChart = new Chart(
                    document.getElementById('donutChart'),
                    donutConfig
                );
            </script>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>