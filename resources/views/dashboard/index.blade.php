<x-app-layout title="Dashboard">
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16" x-data="dashboardData()">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Your Monthly Overview</h2>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-8">
                <!-- Treemap Chart -->
                <div id="treemapChart" class="lg:col-span-8 col-span-12" x-init="renderTreemapChart()"></div>

                <!-- Radial Bar Charts -->
                <div class="lg:col-span-4 col-span-12">
                    <div class="flex justify-between">
                        <div class="flex gap-x-2 items-center">
                            Monthly Budget : <p class="font-semibold">RM {{ $budget }}</p>
                        </div>
                        @if (!empty($budgetAmount))
                            <a class="flex justify-end" href="{{ route('budget.create') }}">
                                <svg class="w-4 h-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div class="flex gap-x-2 items-center">Budget used :
                        <p class="font-semibold">RM {{ $budgetLeft[1] }}</p>
                    </div>
                    <div class="flex gap-x-2 items-center">Budget left :
                        <p class="font-semibold">RM {{ $budget - $budgetLeft[1] }}</p>
                    </div>
                    <div id="radialBarChart" x-init="renderRadialBarChart($el)"></div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function dashboardData() {
            return {
                renderTreemapChart() {
                    var optionsTreemap = {
                        series: [{
                            data: {!! $expensesDistribution !!}
                        }],
                        chart: {
                            height: 350,
                            type: 'treemap'
                        },
                        title: {
                            text: 'Your Expenses Distribution'
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val === 0 ? '0 (no data)' : val;
                                }
                            }
                        },
                        plotOptions: {
                            treemap: {
                                distributed: true,
                                enableShades: true,
                                shadeIntensity: 0.5
                            }
                        }
                    };
                    var treemapChart = new ApexCharts(document.querySelector("#treemapChart"), optionsTreemap);
                    treemapChart.render();
                },
                renderRadialBarChart(element) {
                    var optionsRadialBar = {
                        series: [{{ $budgetLeft[0] }}],
                        chart: {
                            height: 350,
                            type: 'radialBar'
                        },
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    size: '70%'
                                }
                            }
                        },
                        labels: ['Your Budget left']
                    };
                    var radialBarChart = new ApexCharts(element, optionsRadialBar);
                    radialBarChart.render();
                }
            }
        }
    </script>
</x-app-layout>
