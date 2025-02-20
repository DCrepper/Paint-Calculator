<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CalculationFormSendToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public $pdfPath;

    public function __construct(array $data, string $pdfPath)
    {
        $this->data = $data;
        $this->pdfPath = $pdfPath;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Calculation Form Send To Admin',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.calculation-form-send-to-admin',
        );
    }

    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->view('emails.calculation_admin')
            ->with('data', $this->data)
            ->attach($this->pdfPath, [
                'as' => 'calculation.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
