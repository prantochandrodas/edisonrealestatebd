<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\AboutChairman;
use Illuminate\Http\Request;

class AboutChairmanController extends Controller
{
    public function index(){
        $data=AboutChairman::all();
        return view('backend.about_us.about_chairman.index',compact('data'));
    }

    public function create(){
        return view('backend.about_us.about_chairman.create');
    }

    public function getdata(Request $request){
        if($request->ajax()){
            $data=AboutChairman::all();
            return datatables($data)
            ->addColumn('action',function($row){
                $editUrl=route('about-chairmans.edit',$row->id);
                $deleteUrl=route('about-chairmans.distroy',$row->id);

                $csrfToken=csrf_field();
                $methodField=method_field('DELETE');

                $editBtn='<a href="'. $editUrl .'" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                $deleteBtn = '
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . $csrfToken . '
                    ' . $methodField . '
                    <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                </form>';
                return $editBtn .''.$deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    

}
