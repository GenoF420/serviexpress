<?php

namespace models;

use DateTime;

class User
{
    protected UserType $type = UserType::User;
    protected int $rut;
    protected string $dv;
    protected string $name;
    protected string $lastName;
    protected string $email;
    protected DateTime $birthday;
    protected UserGender $gender;

    function Type(): UserType
    {
        return $this->type;
    }

    public function __construct()
    {
        $this->LoadDefault();
        //TODO LOAD FROM DATABASE!
        \Session::getInstance()->Set("user", $this->email);

    }

    public function LoadDefault(): void
    {
        $this->rut = 10885901;
        $this->dv = "7";
        $this->name = "Juan";
        $this->lastName = "Guerrero";
        $this->email = "juan@serviexpress.cl";
        $this->gender = UserGender::Male;
    }
}