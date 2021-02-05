<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branchs = Branch::orderBy('created_at', 'DESC')->get();
        return view('manages.branch.list')->with('branchs', $branchs)
                                        ->with('title', 'Danh sách chi nhánh');
    }

    public function store()
    {
        $branch = Branch::create([
            'name' => request()->name,
            'address' => request()->address
        ]);
        return response($branch, 200);
    }

    public function update()
    {
        Branch::where('id', request()->id)->update([
            'name' => request()->name,
            'address' => request()->address
        ]);
        $branch = Branch::findOrFail(request()->id);
        return response($branch, 200);
    }

    public function update_status()
    {
        Branch::where('id', request()->id)->update(['status' => request()->status]);
        return response("Update status successfully!", 200);
    }

    public function delete()
    {
        $branch = Branch::findOrFail(request()->id);
        $branch->delete();
        return response("Delete successfully!", 200);
    }
}
