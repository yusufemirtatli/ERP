<?php

namespace App\Http\Controllers\table;

use App\Http\Controllers\Controller;
use App\Models\tables;
use Illuminate\Http\Request;
use Laravel\Prompts\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $tables = tables::all();
        return view('myviews.tables.tables-index',[
          'tables'=>$tables,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      $data = new tables();
      $data->title = $request->title;
      $data->save();

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

  public function detail($id)
  {
    $table = tables::find($id);
    return view('myviews.tables.table-detail',[
      'table'=>$table,
    ]);
  }
}
