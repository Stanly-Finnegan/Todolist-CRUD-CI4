<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,

        // Custom Rules

        \App\Validations\PasswordValidation::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $strongPasswordValidation = [
        'name' => [
            'label' => 'Name',
            'rules' => 'required|min_length[5]|alpha_numeric_punct'
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[users_ms.email]'
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|strongPassword[password]',
            // 'errors' => [
            //     // 'strongPassword' => 'Password not strong'
            // ]
        ],
    ];
}
