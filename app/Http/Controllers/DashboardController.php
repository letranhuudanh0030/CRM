<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Device;
use App\Maintenance;
use App\User;
use Illuminate\Http\Request;
use App\Exports\TasksExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        $branches = Branch::all();
        $tasks = Maintenance::all();
        $users = User::all();
        
        return view('manages.dashboard')->with([
            'title' => 'Danh sách công việc',
            'devices' => $devices,
            'branches' => $branches,
            'tasks' => $tasks,
            'users' => $users
        ]);
    }

    public function export() 
    {
        $dateCurrent = date('d_m_Y');
        $branch_id = request()->branch_id;
        return Excel::download(new TasksExport($branch_id), "tasks_$dateCurrent.xlsx");
    }

    public function export_pdf()
    {

        // dd(request()->all());
        
        $dateCurrent = date('d_m_Y');
        // instantiate and use the dompdf class
       
        $dompdf = new Dompdf();
        
        $tasks = Maintenance::with('device','branch','creator', 'technician')->get();
        if(request()->branch_id){
            $branch_id = request()->branch_id;
            if($branch_id != null) {
                $tasks = Maintenance::with('device','branch','creator', 'technician')->where('branch_id', $branch_id)->get();
            } 
        }


        $td = "";
        $result = '';
        
        foreach ($tasks as $key => $task) {

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

            $start_date = isset($task->required_date) ? date('d-m-Y H:i:s', strtotime($task->required_date)) : date('d-m-Y H:i:s', strtotime($task->created_at));
            $end_date = isset($task->success_date) ? date('d-m-Y H:i:s', strtotime($task->success_date)) : "Đang chờ cập nhật";

            $td .= "
                <tr>
                    <td>$task->id</td>
                    <td>".$task->device['name']."</td>
                    <td>".$task->branch['name']."</td>
                    <td>".$task->technician['name']."</td>
                    <td>".$task->creator['name']."</td>
                    <td>$result</td>
                    <td>$start_date</td>
                    <td>$end_date</td>
                </tr>
            ";
        }


        $html = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
            <title>tasks</title>
            <style>
                @font-face {
                    font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: normal;
                }
                table
                {
                    width: 100%;
                }
                table, th, td 
                {
                    border: solid 1px #DDD;
                    border-collapse: collapse;
                    padding: 2px 3px;
                    text-align: center;
                    font-family: 'Montserrat', sans-serif;
                }
            </style>
        </head>
        <body>
            <table> 
                <thead>
                    <tr>
                        <th>#</th>,
                        <th>Thiết bị</th>,
                        <th>Chi nhánh</th>,
                        <th>Kỹ thuật</th>,
                        <th>Người yêu cầu</th>,
                        <th>Tình trạng</th>,
                        <th>Ngày yêu cầu</th>,
                        <th>Ngày hoàn thành</th>
                    </tr>
                </thead>
                <tbody>
                    $td
                </tbody>
            </table>
        </body>
        </html>
        ";

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();
        // dd($dompdf->output());     

        // Output the generated PDF to Browser
        return $dompdf->stream("tasks_$dateCurrent.pdf");
    }
}
