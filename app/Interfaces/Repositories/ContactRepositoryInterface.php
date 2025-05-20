<?php

namespace App\Interfaces\Repositories;

interface ContactRepositoryInterface
{
    public function index();
    public function show($id);
    public function store($contactDTO);
    public function update($status, $id);
    public function destroy($id);
}
