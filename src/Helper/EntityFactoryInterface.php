<?php


namespace App\Helper;


interface EntityFactoryInterface
{
    public function criar(string $bodyRequest);
}