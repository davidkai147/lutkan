<?php

namespace App\Repositories\Milestone;
use App\Models\Milestone;
use App\Repositories\BaseRepository;

class MilestoneRepository extends BaseRepository implements MilestoneRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Milestone::class;
    }
}
