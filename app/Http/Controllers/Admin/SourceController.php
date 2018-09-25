<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index()
    {
        $records = Source::all();
        return view('admin.source.index', compact('records'));
    }

    public function create()
    {
        return view('admin.source.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url'
        ]);

        $newRecord = Source::create(['url' => $request->url]);

        if(!$newRecord){
            throw new Exception("Can't created.", 500);
            
        }

        $request->session()->flash('status', 'Saved!');

        return redirect()->route('source.index');

    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $source = Source::findOrFail($id);

        $source->delete();

        $request->session()->flash('status', 'Deleted!');

        return redirect()->route('source.index');
    }
}
