<?php
/**
 * Created by PhpStorm.
 * User: THU_HUYEN
 * Date: 8/4/2018
 * Time: 1:30 PM
 */

namespace App\Api\Dto;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "post"={
 *              "path"="/users/forgot-password-request",
 *          },
 *      },
 *      itemOperations={},
 * )
 */
final class ForgotPasswordRequest
{
    /**
     * @Assert\NotBlank
     * @Assert\Email
     */
    public $email;
}