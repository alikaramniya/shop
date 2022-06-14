<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactInsertRequest;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contact;

    public function __construct(ContactRepository $contact)
    {
        $this->middleware('auth')->except(['create', 'insert']);

        $this->contact = $contact; 
    }

    /**
     * Index method for get list contact
     *
     * @param \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderByDesc('state', 'unread')->oldest()->paginate();

        return view('public.contact.list', compact('contacts'));
    }

    /**
     * Read method for read one contact
     *
     * @param \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function read(Contact $contact)
    {
        $contact->state = 'read';
        $contact->save();

        return view('public.contact.read', compact('contact'));
    }

    /**
     * Create method for show form add new contact
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.contact.create');
    }

    /**
     * Insert method for insert new record
     *
     * @param \Illuminate\Http\Response
     */
    public function insert(ContactInsertRequest $request)
    {
        $data = collect($request->all())->forget('_token')->toArray();

        $this->contact->insert($data);

        return back()->with([
            'success' => 'ok',
            'message' => 'نظر شما با موفقیت اضافه شد'
        ]);
    }

    /**
     * Delete method for remove one contact
     *
     * @param \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function delete(Contact $contact)
    {
        $this->contact->delete($contact);

        return redirect()->route('contact_list')->with([
            'success' => 'ok',
            'message' => 'تماس با موفقیت حذف شد'
        ]);
    }
}
