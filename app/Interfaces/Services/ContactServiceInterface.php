<?php

namespace App\Interfaces\Services;

interface ContactServiceInterface
{
    public function allContact();
    public function createContact($contactDTO);
    public function updateStatusContact($status, $id);
    public function getContact($id);
    public function deleteContact($id);
}
