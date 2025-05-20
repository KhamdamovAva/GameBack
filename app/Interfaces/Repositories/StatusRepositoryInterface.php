<?php

namespace App\Interfaces\Repositories;

interface StatusRepositoryInterface
{
    public function allStatuses();
    public function createStatus($data);
    public function updateStatus($data, $id);
    public function showStatus($id);
    public function getStatusBySlug($slug);
    public function destroyStatus($id);
}
