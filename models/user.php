<?php
require_once 'country.php';
require_once 'human.php';

class User
{
    private int $id;
    private string $phone;
    private string $email;
    private string $firstName;
    private string $lastName;
    private DateTime $birthdate;
    private Country $country;
}
