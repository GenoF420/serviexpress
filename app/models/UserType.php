<?php

namespace models;
enum UserType: int
{
    case User = 0;
    case Mechanic = 5;
    case Administrator = 10;
}