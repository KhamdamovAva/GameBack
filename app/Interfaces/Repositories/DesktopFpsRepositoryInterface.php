<?php

namespace App\Interfaces\Repositories;

interface DesktopFpsRepositoryInterface
{
    public function index();
    public function store($data);
    public function update($data, $id);
    public function show($id);
    public function delete($id);
}
