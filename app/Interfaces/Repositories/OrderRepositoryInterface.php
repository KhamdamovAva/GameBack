<?php

namespace App\Interfaces\Repositories;

interface OrderRepositoryInterface
{
    public function index();
    public function create($data);
    public function update($status, $id);
    public function show($id);
    public function destroy($id);
}
