<?php

namespace App\Interfaces\Repositories;

interface ProductTypeRepositoryInterface
{
    public function index();
    public function show($slug);
    public function store($data);
    public function update($data, $id);
    public function destroy($id);
}
