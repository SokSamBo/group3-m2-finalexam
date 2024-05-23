<?php
namespace Group3M2\ContactForm\Http\Controllers;
//Q: use contact model from package
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Group3M2\ContactForm\Models\Contact;
class ContactFormController extends Controller
{
    public function showForm()
    {
        return view('contactform::form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->route('contact.thank-you');
    }

    public function thankYou()
    {
        return view('contactform::thank-you');
    }

    public function listContacts()
    {
        $contacts = Contact::all();

        return view('contactform::admin', compact('contacts'));
    }
}