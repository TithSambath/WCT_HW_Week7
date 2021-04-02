<?php 

    require_once(__DIR__.'/../interface/ipay.php');

    class PiPay implements IPay
    {
        public float $fee = 0.5;

        public function __construct
        (
            protected string $item,
            protected float $price,
            protected string $qty,   
        ){}

        public function payment()
        {   
            return $this->price * $this->fee;
        }
        public function getPaymentMethod()
        {
            return 'PiPay';
        }
        public function getPrice()
        {
            return $this->price;
        }
        public function getItems()
        {
            return $this->item;
        }
        public function getQty()
        {
            return $this->qty;
        }
        public function getTotal(){
            return $this->price * $this->qty;
        }
    }