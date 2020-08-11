<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Carbon\Carbon;

class ContactController extends Controller
{
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
}
