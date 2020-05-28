<?php

namespace App\Repositories;

use App\Models\FeedbackData;


class FeedbackDataRepository
{
    /**
     * @return FeedbackData[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return FeedbackData::all();
    }
}
