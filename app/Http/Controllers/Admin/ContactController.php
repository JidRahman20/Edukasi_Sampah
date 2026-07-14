<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts/messages.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
