<?php

namespace App\Charts;

use App\Models\Data;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class WMReaderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Setup data
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();
        $dates = [];
        $readersPerDay = [];

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
            $readersPerDay[] = Data::whereDate('created_at', $date)->count();
        }

        return $this->chart->lineChart()
            ->setTitle('Data WMReader Masuk Harian')
            ->setSubtitle('Jumlah Data Masuk per Hari')
            ->addData('WMReader Masuk', $readersPerDay)
            ->setXAxis($dates);
    }
}