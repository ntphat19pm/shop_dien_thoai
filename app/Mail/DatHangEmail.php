<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\DonHang;

class DatHangEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $donhang;
    public function __construct(DonHang $dh)
    {
        $this->donhang = $dh;
    }
    
    public function build()
    {
        return $this->view('emails.dathang')
        ->subject('Đặt hàng thành công tại ' . config('app.name', 'Laravel'));
    }
}
