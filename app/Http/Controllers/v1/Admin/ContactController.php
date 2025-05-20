<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\ContactDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ContactResource;
use App\Interfaces\Services\ContactServiceInterface;
use App\Http\Requests\v1\Contact\StoreContactRequest;
use App\Http\Requests\v1\Contact\UpdateContactRequest;

class ContactController extends Controller
{
    public function __construct(protected ContactServiceInterface $contactService){

    }
    public function index()
    {
        $contacts = $this->contactService->allContact();
        return $this->responsePagination($contacts,ContactResource::collection($contacts), __('successes.contact.all'));
    }
    public function show(string $id)
    {
        $contact = $this->contactService->getContact($id);
        return $this->success(new ContactResource($contact), __('successes.contact.show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, string $id)
    {
        $contact = $this->contactService->updateStatusContact($request->status, $id);
        return $this->success(new ContactResource($contact), __('successes.contact.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->contactService->deleteContact($id);
        return $this->success([], __('successes.contact.deleted'));
    }
}
