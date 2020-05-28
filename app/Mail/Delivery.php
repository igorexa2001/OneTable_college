<?php


namespace App\Mail;


use App\DeliveryData;
use App\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Delivery extends Mailable
{
    use Queueable, SerializesModels;

    public $deliveryData;

    /**
     * Create a new message instance.
     *
     * @param DeliveryData $deliveryData
     */
    public function __construct(DeliveryData $deliveryData)
    {
        $this->deliveryData = $deliveryData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('from@example.com')->view('emails.delivery');
    }
}
