<?php

namespace App\Exports;

use App\Maintenance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class TasksExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{


    public function collection()
    {
        $task = Maintenance::with('device','branch','creator', 'technician')->latest()->first();
        // dd($task);
        return $task;
    }

    public function map($task): array
    {
        $result = '';
        $num_result = $task->result;
        switch ($num_result) {
            case 1:
                $result = "Đang xử lý";
                break;
            case 2:
                $result = "Hoàn thành";
                break;
            case 3:
                $result = "Đang đặt hàng";
                break;
            default:
                $result = "Đang chờ cập nhật";
                break;
        }


        return [
            $task->id,
            $task->device['name'],
            $task->branch['name'],
            $task->technician['name'],
            $task->creator['name'],
            $result,
            isset($task->required_date) ? Date::stringToExcel($task->required_date) : Date::dateTimeToExcel($task->created_at),
            isset($task->success_date) ? Date::stringToExcel($task->success_date) : "Đang chờ cập nhật",

        ];
    }

    // public function dateFormat($date)
    // {
    //     return Date::dateTimeToExcel($date);
    // }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Thiết bị',
            'Chi nhánh',
            'Kỹ thuật',
            'Người yêu cầu',
            'Tình trạng',
            'Ngày yêu cầu',
            'Ngày hoàn thành'
        ];
    }


}
