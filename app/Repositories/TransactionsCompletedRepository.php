<?php

namespace App\Repositories;


use Inertia\Inertia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\TransactionCompleted;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\TransactionsCompletedRepositoryInterface;

class TransactionsCompletedRepository implements TransactionsCompletedRepositoryInterface
{
    
    public function index()
    {
        $data = TransactionCompleted::with('user')->get();
        foreach ($data as $item) {
            $item->Communication_method = $item->communcation_method();
        }
        
        return $data;
       
    }


    public function show($id)
    {
        return TransactionCompleted::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        // dd($request);
        $data = new TransactionCompleted;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->email = $request->email;
        $data->whatsapp = $request->whatsapp;
        // $data->communcation_method_id = $request->communcation_method_id;
        
        $data->Communication_method = implode(',',$request->communcation_method);
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Permission::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return TransactionCompleted::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = TransactionCompleted::findOrFail($id);
        // dd($request->name_ar);
        $data->name_ar = $request->name_ar ?? $data->name_ar;
        $data->name_en = $request->name_en ?? $data->name_en;
        $data->email = $request->email ?? $data->email;
        $data->whatsapp = $request->whatsapp ?? $data->whatsapp;
        $data->Communication_method = $request->Communication_method ?? $data->Communication_method;
        
        // $data->active = $request->active ?? $data->active;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return $data;
    }

    public function destroy($id)
    {
        $data = TransactionCompleted::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
