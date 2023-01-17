<?php
namespace App\Requests;

use App\Requests\BaseRequest;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Blank;


class DeviceRequest extends BaseRequest {

    #[Type('string')]
    #[NotBlank()]
    protected $name;

    #[NotBlank()]
    protected $number;

    
    protected $category;

    #[Type('string')]
    #[NotBlank()]
    protected $description;

}