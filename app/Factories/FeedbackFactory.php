<?php
namespace App\Factories;

use App\Models\FeedbackData;

class FeedbackFactory
{
    /**
     * @return FeedbackData
     */
    public function create()
    {
        return new FeedbackData();
    }
}
