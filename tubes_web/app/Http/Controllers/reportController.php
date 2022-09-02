<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reports = Report::all();
        return view("index", compact("reports"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $lampiran = $request->file('lampiran');
        $lampiran->storeAs('public/images', $lampiran->getClientOriginalName());
        Report::create([
            'laporan'   => $request->laporan,
            'aspek'     => $request->aspek,
            'lampiran'  => $request->file('lampiran')->getClientOriginalName()
        ]);

        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $report = Report::where('id', $id)->first();
        return view('detail', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $report = Report::where('id', $id)->first();
        return view('edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $destination = 'public/images';
        if (Storage::exists($destination . '/' . $request->file('lampiran')->getClientOriginalName())) {
            Storage::delete($destination . '/' . $request->file('lampiran')->getClientOriginalName());
        }
        $lampiran = $request->file('lampiran');
        $lampiran->storeAs('public/images', $lampiran->getClientOriginalName());

        Report::where('id', $id)
            ->update([
                'laporan'   => $request->laporan,
                'aspek'     => $request->aspek,
                'lampiran'  => $request->file('lampiran')->getClientOriginalName()
            ]);

        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Report::destroy($id);
        return redirect()->route('report.index');
    }

    public function search(Request $request)
    {
        $laporan = $request->laporan;
        $laporan = '%' . $laporan . '%';
        $reports = Report::where('laporan', 'like', $laporan)->orderByDesc('created_at')->get();
        if ($reports->isEmpty()) {
            return view('index', compact('reports'))->with('message', 'Laporan tidak ditemukan');
        } else {
            return view('index', compact('reports'));
        }

        //return view("index", compact("reports"));
    }
}
