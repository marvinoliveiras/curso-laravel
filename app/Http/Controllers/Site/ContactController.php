<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use App\Notifications\NewContact;
use Illuminate\Support\Facades\Notification;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.contact.index');
    }
    public function postContact(
        ContactFormRequest $request)
    {
        $contact = Contact::create(
            $request->all()
        );
        Notification::route('mail',
            config('mail.from.address'))
            ->notify(new NewContact($contact)
        );
        //'Contato enviado com sucesso!');
        //return back();
        return redirect()->route(
            'site.contact')
            ->with([
                'success' => true,
                'message' =>
                    'Contato enviado com sucesso!'
        ]);
    }
}
