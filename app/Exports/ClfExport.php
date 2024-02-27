<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterSheet;

class ClfExport implements FromView, ShouldAutoSize, WithHeadingRow
{
    private $clf_activities;

    public function __construct($clf_activities)
    {
        $this->clf_activities    =  $clf_activities;

    }

    public function view(): View
    {

        return view('export.clf', [
            'clf_activities' => $this->clf_activities,
        ]);
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(18)->getAlignment()->setWrapText(true);
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'D' => 25,
            'E' => 25,
            'F' => 25,
            'G' => 25,
            'H' => 25,
            'I' => 25,
            'J' => 25,
            'K' => 25,
            'L' => 25,
        ];
    }
}
