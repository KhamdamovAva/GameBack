<?php

namespace App\Http\Controllers\v1\User;

use App\DTO\ContactDTO;
use App\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ContactResource;
use App\Http\Requests\v1\Contact\StoreContactRequest;

class ContactController extends Controller
{
    public function __construct(protected ContactService $contactService){

    }
    public function store(StoreContactRequest $request)
    {
        $contactDTO = new ContactDTO($request->fullname, $request->phone);
        $contact = $this->contactService->createContact($contactDTO);
        return $this->success(new ContactResource($contact), __('successes.contact.created'), 201);
    }

}
