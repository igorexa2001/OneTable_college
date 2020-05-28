<?php

namespace App\Mail;

use App\Models\FeedbackData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Feedback extends Mailable
{
    use Queueable, SerializesModels;

    public $feedbackData;

    /**
     * Create a new message instance.
     *
     * @param FeedbackData $feedbackData
     */
    public function __construct(FeedbackData $feedbackData)
    {
        $this->feedbackData = $feedbackData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')->view('emails.feedback');
    }
}
