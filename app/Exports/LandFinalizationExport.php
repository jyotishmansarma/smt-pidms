<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LandFinalizationExport implements FromView, ShouldAutoSize, WithHeadingRow
{
    private $task;

    public function __construct($task)
    {
        $this->task    =  $task;

    }

    public function view(): View
    {

        return view('export.land', [
            'sanctionedSchemes' => $this->task,
        ]);
    }
}
