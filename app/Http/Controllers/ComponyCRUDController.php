<?php

namespace App\Http\Controllers;


use App\Models\Company;
use Illuminate\Http\Request;

class ComponyCRUDController extends Controller
{
    public function index(Request $request) {
        $search = $request->search ?? null;
        $monthYear = $request->monthYear ?? null;
        if ($search != null) {
            # code...
            $data['companies'] = Company::where('dateRecording', 'like', '%' . $search . '%')->orderBy('id', 'asc')->paginate(5);
            return view('companies.index', $data);

        } else if($monthYear != null) {
            # code...
            $data['companies'] = Company::where('dateRecording', 'like', '%' .$monthYear.'%')->orderBy('id', 'asc')->paginate(5);
            return view('companies.index', $data);

        }else{
            $data['companies'] = Company::orderBy('id', 'asc')->paginate(5);
            return view('companies.index', $data);
        }
        // $data['companies'] = Company::orderBy('id', 'asc')->paginate(5);
        // return view('companies.index', $data);
    }

    // Create resource
    public function create() {
        return view('companies.create');
    }

    // Store resource
    public function store(Request $request) {
        $request->validate([
            'jobType' => 'required',
            'jobName' => 'required',
            'timeToStart' => 'required',
            'timeToEnd' => 'required',
            'Count' => 'required',
            'dateRecording' => 'required',
            'lastDateRecording' => 'required'
        ]);

        $company = new Company;
        $company -> jobType = $request->jobType;
        $company -> jobName = $request->jobName;
        $company -> timeToStart = $request->timeToStart;
        $company -> timeToEnd = $request->timeToEnd;
        $company -> Count = $request->Count;
        $company -> dateRecording = $request->dateRecording;
        $company -> lastDateRecording = $request->lastDateRecording;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company has been created successfully.');
    }

    public function edit(Company $company) {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'jobType' => 'required',
            'jobName' => 'required',
            'timeToStart' => 'required',
            'timeToEnd' => 'required',
            'Count' => 'required',
            'dateRecording' => 'required',
            'lastDateRecording' => 'required'
        ]);
        $company = Company::find($id);
        $company -> jobType = $request->jobType;
        $company -> jobName = $request->jobName;
        $company -> timeToStart = $request->timeToStart;
        $company -> timeToEnd = $request->timeToEnd;
        $company -> Count = $request->Count;
        $company -> dateRecording = $request->dateRecording;
        $company -> lastDateRecording = $request->lastDateRecording;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company has been updated successfully.');
    }

    public function destroy(Company $company) {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company has been deleted successfully.');
    }
}