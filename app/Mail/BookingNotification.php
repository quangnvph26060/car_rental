<?php

// app/Mail/BookingNotification.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $carName;
    public $typeName;
    public $start_date;
    public $rental_days;
    public $name;
    public $phone;
    public $note;

    /**
     * Tạo một instance mới của email.
     *
     * @param string $carName
     * @param string $typeName
     * @param string $start_date
     * @param int $rental_days
     * @param string $name
     * @param string $phone
     * @param string $note
     */
    public function __construct($carName, $typeName, $start_date, $rental_days, $name, $phone, $note)
    {
        $this->carName = $carName;
        $this->typeName = $typeName;
        $this->start_date = $start_date;
        $this->rental_days = $rental_days;
        $this->name = $name;
        $this->phone = $phone;
        $this->note = $note;
    }

    /**
     * Xây dựng email.
     *
     * @return $this
     */
    public function build()
    {
        $email = env('MAIL_TO');
        return $this->from('sgovietnam.dev@gmail.com')
            ->to($email)
            ->subject('Yêu cầu đặt xe mới')
            ->view('emails.user_phone_notification');
    }
}
