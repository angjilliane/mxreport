<?php

namespace MX\Report;

use App\Http\Controllers\Controller;
use Request;
use MX\Report\Report;

class ReportController extends Controller
{
    public function index()
    {
        return redirect()->route('report.create');
    }

    public function create()
    {
        $reports = Report::all();
        $submit = 'Add';
        return view('mx.report.list', compact('reports', 'submit'));
    }

    public function store()
    {
        $input = Request::all();
        Report::create($input);
        return redirect()->route('report.create');
    }

    public function edit($id)
    {
        $reports = Report::all();
        $report = $reports->find($id);
        $submit = 'Update';
        return view('mx.report.list', compact('reports', 'report', 'submit'));
    }

    public function update($id)
    {
        $input = Request::all();
        $report = Report::findOrFail($id);
        $report->update($input);
        return redirect()->route('report.create');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('report.create');
    }
}