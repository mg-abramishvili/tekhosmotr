<?php

namespace App\Mail;
use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLead extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.lead')
            ->with([
            'station' => $this->lead->station,
            'date' => $this->lead->date,
            'time' => $this->lead->time,
            'name' => $this->lead->name,
            'phone' => $this->lead->phone,
        ]);
    }
}
