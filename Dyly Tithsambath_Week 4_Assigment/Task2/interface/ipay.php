<?php 

    interface IPay 
    {
        public function payment();
        public function getPaymentMethod();
        public function getPrice();
        public function getItems();
        public function getQty();
        public function getTotal();
    }