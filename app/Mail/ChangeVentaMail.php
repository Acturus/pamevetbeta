<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangeVentaMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $costotal;
    protected $direntrega;
    protected $codigoped;
    protected $today;
    protected $productos;
    protected $servicios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $costotal, String $direntrega, String $codigoped, String $today, $productos)
    {
        $this->costotal = $costotal;
        $this->direntrega = $direntrega;
        $this->codigoped = $codigoped;
        $this->today = $today;
        $this->productos = $productos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Compra Registrada')->view('mail.changeStateVenta', [
            "costotal" => $this->costotal,
            "direntrega" => $this->direntrega,
            "codigoped" => $this->codigoped,
            "today" => $this->today,
            "productos" => $this->productos
        ]);
    }
}
