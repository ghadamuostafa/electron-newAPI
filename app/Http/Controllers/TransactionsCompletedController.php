<?php

namespace App\Http\Controllers;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\TransactionCompleted;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\TransactionsCompletedRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TransactionsCompletedController extends Controller
{
    protected $transactionsCompletedRepository;

    public function __construct(TransactionsCompletedRepositoryInterface $transactionsCompletedRepository)
    {
        $this->transactionsCompletedRepository = $transactionsCompletedRepository;
    }

    public function index()
    {
        $data = $this->transactionsCompletedRepository->index();

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم دخول صفحة منجزين المعاملات" ;
        $log->save();
       }
        // return response()->json($permissions);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    public function getall(Request $request)
    {
        if ($request->ajax()) {
            $data = TransactionCompleted::select('*');
            return DataTables::of($data)->toJson();
        }
    }

    public function show($id)
    {
        $data = $this->transactionsCompletedRepository->show($id);

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم عرض  منجز  {$data->name_ar} فى صفحة منجزين المعاملات" ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');
        
    }

    public function store(Request $request)
    {
        $messages = [
            'name_ar.required' => 'الاسم بالعربى  مطلوب.',
            'name_en.required' => 'الاسم بالانجليزية  مطلوب.',
            'email.required' => 'البريد الالكترونى  مطلوب.',
            'communcation_method.required' => 'وسيلة التواصل  مطلوب.',
            
        ];

        $validatedData = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required',
            'communcation_method' => 'required',
        ], $messages);

        if ($validatedData->fails()) {

            return $this->respondError('Validation Error.', $validatedData->errors(), 400);
        }
        
        $data = $this->transactionsCompletedRepository->store($request);
        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم اضافة منجز معاملات جديد فى صفحة منجزين المعاملات" ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Store Data successfully.');

    }

    public function edit($id)
    {
        $data = $this->transactionsCompletedRepository->show($id);

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم الدخول  لتعديل  منجز معاملات  {$data->name_ar}   " ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    public function update($id ,  Request $request)
    {
        //
        // dd($request-);
        $data = $this->transactionsCompletedRepository->update($id  ,$request);

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم   تعديل  منجز  {$data->name_ar}   " ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Update Data successfully.');
    }


    public function destroy($id)
    {
        $data = $this->transactionsCompletedRepository->destroy($id);

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم   مسح  منجز  {$data->name_ar}   " ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Delete Data successfully.');
    }
}
