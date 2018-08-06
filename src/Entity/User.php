<?php
/**
 * Created by PhpStorm.
 * User: THU_HUYEN
 * Date: 8/4/2018
 * Time: 2:07 PM
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string $email A name property - this description will be available in the API documentation too.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $email;
    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $password;
    /**
     * @ORM\Column(type="boolean" )
     */
    public $passwordreset;
}