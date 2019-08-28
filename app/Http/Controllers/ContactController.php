<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\User;

class ContactController extends Controller
{
   
    public function index()
    {
        $userId = auth()->user()->id;
        
        if($userId == 1){
            $contacts = Contact::all()->where('ativo','1')->sortByDesc('id');
        }else{
            $contacts = Contact::all()->where('user_id', $userId)->where('ativo','1')->sortByDesc('id');
        }
        
        $users = User::all();

        return view('stakes.contacts.index', compact('contacts','users'));
    }

    public function create()
    {
        $stake = auth()->user()->stake;
        return view('stakes.contacts.create', compact('stake'));
    }

    public function store(Request $request)
    {
        $contact = new Contact();

        $contact->user_id = auth()->user()->id;
        $contact->stake = auth()->user()->stake;
        $contact->message_type = $request->message_type;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->route('contacts.index')->with('alertSuccess','Mensagem enviada com sucesso! Aguarde resposta e veja nesta mesma página');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stake = auth()->user()->stake;
        
        $contact = Contact::find($id);
        $userName = User::where('id',$contact->user_id)->value('name');
        $userLastname = User::where('id',$contact->user_id)->value('lastname');
        $userPhone = User::where('id',$contact->user_id)->value('phone');
        $userWard = User::where('id',$contact->user_id)->value('ward');
        
        return view('stakes.contacts.update', compact('contact','stake','userName','userLastname','userPhone','userWard'));
        
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);

        $contact->answer = $request->answer;

        $contact->update();

        return redirect()->route('contacts.index')->with('alertSuccess', 'Resposta inserida!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->ativo = '0';

        $contact->update();

        return redirect()->back()->with('alertDanger', 'Excluído!');

    }
}
