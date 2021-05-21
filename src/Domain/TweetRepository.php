<?php


namespace App\Domain;


use Doctrine\Common\Collections\ArrayCollection;

interface TweetRepository
{
    public function searchByUsername(String $username) : ArrayCollection;
}