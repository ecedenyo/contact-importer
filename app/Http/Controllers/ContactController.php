<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;
use App\Imports\ContactsImport;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest('id')->where('user_id', Auth::id())->paginate(10);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contact::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'creditcard_number' => $request->creditcard_number,
            'creditcard_lastnumbers' => $request->creditcard_lastnumbers,
            'franchise' => $request->franchise,
            'email' => $request->email,
            'user_id' => $request->user_id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    /* public function edit(Contact $contact)
    {
        //
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, Contact $contact)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    /* public function destroy(Contact $contact)
    {
        //
    } */

    public function importExport()
    {
       return view('welcome');
    }
   
    public function importFile(Request $request) 
    {
        Excel::import(new ContactsImport, $request->file('contactfile')->store('temp'));
        return back();
    }

    public function exportFile() 
    {
        return Excel::download(new ContactsExport, 'contacts-list.xlsx');
    }
}
