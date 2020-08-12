<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Carbon\Carbon;
use Response;
use Validator;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Contact::select('*'))
            ->addColumn('action', 'admin.pages.contact.action')
            ->addColumn('created_at', 'admin.pages.share.created_at')
            ->addColumn('status', 'admin.pages.contact.status')
            ->rawColumns(['action', 'status'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.pages.contact.list');
    }

    public function add(ContactRequest $request)
    {
        $datetime = Carbon::now('Asia/Ho_Chi_Minh');
        $details = ['name' => $request->name, 
                    'email' => $request->email,
                    'subject' => $request->subject, 
                    'content' => $request->content, 
                    'created_at' => $datetime, 
                ];
        Contact::create($details);  
        return redirect()->back()->with('success', 'Gửi liên hệ thành công');
    }

    public function reply($id)
    {   
        $where = array('id' => $id);
        $contact  = Contact::where($where)->first();

        return Response::json($contact);
    }

    public function post_reply(Request $request) 
    {
        $rules = array(
            'content' => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(['errors' => $error->errors()->all()]);
        }
        
        $id = $request->contact_id;
        $name = $request->name;
        $email = $request->email;
        $content = $request->content;
       
        Mail::send('admin.pages.contact.reply_contact', [
            'content' => $content,
        ], function ($msg) use ($email, $name){
            $msg->to($email, $name)->subject('Phản hồi liên hệ');
        });

        $status = 1;
        Contact::where('id', $id)->update(array('status' => $status));
        
        return Response::json(['success' => 'Phản hồi thành công']);
    }

    public function destroy($id) 
    {
        Contact::where('id',$id)->delete();

        return Response::json(['success' => 'Xoá thành công']);
    }
}
