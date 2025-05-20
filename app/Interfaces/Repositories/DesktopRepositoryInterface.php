<?php

namespace App\Interfaces\Repositories;

interface DesktopRepositoryInterface
{
    public function index();
    public function store($data);
    public function update($data, $id);
    public function show($slug);
    public function destroy($id);
}
