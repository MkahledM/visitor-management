<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Visitor;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Auth;


class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // //function index()
    // {
    //     return view('visitor');
    // }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $query = Visitor::join('users', 'users.id', '=', 'visitors.visitor_enter_by');

            if(Auth::user()->type == 'User')
            {
                $query->where('visitors.visitor_enter_by', '=', Auth::user()->id);
            }

            $data = $query->get(['visitors.visitor_name', 'visitors.visitor_meet_person_name', 'visitors.visitor_department', 'visitors.visitor_enter_time', 'visitors.visitor_out_time', 'visitors.visitor_status', 'users.name', 'visitors.id']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('visitor_status', function($row){
                    if($row->visitor_status == 'In')
                    {
                        return '<span class="badge bg-success">In</span>';
                    }
                    else
                    {
                        return '<span class="badge bg-danger">Out</span>';
                    }
                })
                ->escapeColumns('visitor_status')
                ->addColumn('action', function($row){
                    if($row->visitor_status == 'In')
                    {
                        return '<a href="/visitor/view/'.$row->id.'" class="btn btn-info btn-sm">View</a>&nbsp;<a href="/visitor/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>
                        ';
                    }
                    else
                    {
                        return '<a href="/visitor/view/'.$row->id.'" class="btn btn-info btn-sm">View</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitor= Visitor::all();
        return view('visitor',["data"=>$visitor]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_visitor');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'identification'=>'required',
            'phone'=>'required',
            'Nationality'=>'required',
            'in_Time'=> 'required',
            'out_Time'=> 'required',
            'Notes'=> 'required'
        ]);
        $visitor =new Visitor;
        $visitor->visitor_name = request("name");
        $visitor->identification_number = request("identification");
        $visitor->visitor_mobile_no = request("phone");
        $visitor->nationality = request("Nationality");
        $visitor->visitor_enter_time = request("in_Time");
        $visitor->visitor_out_time = request("out_Time");
        $visitor->Notes = request("Notes");
        $visitor->save();
        return redirect('visit')->with('success', 'New visitor Added');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        $visitor = Visitor::findOrfail($id);
        $visitor->delete();
        return redirect('visit');
    }
    // public function index2(Request $request)
    // {

    //     $search = $request['search'] ?? "";
    //     dd($search);

    //     if($search != ""){

    //         $visitor = Visitor::where('visitor_mobile_no', 'LIKE', "%$search%")->get();

    //     }else{
    //         $visitor = Visitor::all();
    //     }
    //     $data = compact('visitor', 'search');
    //     return view("visitor",["data"=>$visitor])->with($data);
    // }


    public function search()
    {
        $search_text = $_GET['query'];
        $visitor = Visitor::where('visitor_mobile_no', 'LIKE', "%$search_text%")->get();
                $data = compact('visitor');
                return view("search",["data"=>$visitor])->with($data);
    }
}
