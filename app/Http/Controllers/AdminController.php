<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\DB;
use validator;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $results = DB::table('items')->get();

        return view('admin', ['results' => $results]);
    }

    public function addItem()
    {
        return view('adminDashboard.addItem');
    }
    public function storeItem(Request $request)
    {
        $request->validate(['title' => 'unique:items']);

        if ($request->file('file')) {
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            $fileName  = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/files', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $db = new Item();
        $db->title = $request->title;
        $db->section_type = $request->section_type;
        $db->item_type = $request->item_type;
        $db->details = $request->details;
        $db->file = $fileNameToStore;
        $db->status = $request->status;
        $db->save();

        return back()->with('success','The content have been uploaded successfully.');
    }

    public function itemStatusForm(Request $request)
    {

        $results = DB::table('items')->get();

        return view('adminDashboard.itemStatus', ['results' => $results]);
    }

    public function updateItemStatus(Request $request, $id, $status)
    {

        if($status == 'show'){
            $results = DB::table('items')->where('id', $id)->update(['status' => 'hide']);
        }
        else{
            $results = DB::table('items')->where('id', $id)->update(['status' => 'show']);
        }
        
        return back()->with('success','The content\'s status have been changed successfully.');
    }

    public function imageDetails(Request $request, $data)
    {

        $results = DB::table('items')->where('id', $data)->get();

        return view('adminDashboard.item_image', ['results' => $results]);
    }

    public function videoDetails(Request $request, $data)
    {

        $results = DB::table('items')-> where('id', $data) ->get();
        
        return view('adminDashboard.item_video', ['results' => $results]);
    }
}
