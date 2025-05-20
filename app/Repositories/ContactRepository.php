<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Contact;
use App\Notifications\ContactNotification;
use App\Interfaces\Repositories\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
    public function index(){
        return Contact::paginate(10);
    }
    public function show($id){
        return Contact::findOrFail($id);
    }
    public function store($data){
        $contact = new Contact();
        $contact->fullname = $data['fullname'];
        $contact->phone = $data['phone'];
        $contact->save();
        $contact->refresh();
        $admin = User::whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->firstOrFail();
        $admin->notify(new ContactNotification($contact));
        return $contact;
    }
    public function update($status, $id){
        $contact = $this->show($id);
        $contact->status = $status;
        $contact->save();
        $contact->refresh();
        return $contact;
    }
    public function destroy($id){
        $contact = $this->show($id);
        $contact->delete();
        return;
    }
}
