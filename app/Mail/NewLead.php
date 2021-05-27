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
        return $this->subject('Новая заявка с БашТехОсмотр.РФ')
            ->markdown('emails.lead')
            ->with([
            'station' => $this->lead->station,
            'n_date' => $this->lead->n_date,
            'time' => $this->lead->time,
            'number' => $this->lead->number,
            'category' => $this->lead->category,
            'name' => $this->lead->name,
            'phone' => $this->lead->phone,
            'osago' => $this->lead->osago,
        ]);
    }
}
