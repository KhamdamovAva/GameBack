<?php

namespace App\Interfaces\Repositories;

interface ReviewRepositoryInterface
{
    public function index();
    public function store($data);
    public function update($data, $id);
    public function show($slug);
    public function destroy($id);
}
