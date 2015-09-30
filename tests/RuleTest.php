<?php

use Mockery as m;
use Fadion\Rule\Rule;

class RuleTest extends PHPUnit_Framework_TestCase {
    
    private $rules = [
        'username' => ['required'],
        'email' => ['required', 'email']
    ];
    
    public function testAddRule()
    {
        $rule = new Rule;
        $rule->add('username')->required();
        $rule->add('email')->required()->email();
        
        $this->assertEquals($this->rules, $rule->get());
    }
    
    public function testAddMessage()
    {
        $messages = [
            'username.required' => 'Username is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid'
        ];
        
        $rule = new Rule;
        $rule->add('username')->required()->message('Username is required');
        $rule->add('email')
             ->required()->message('Email is required')
             ->email()->message('Email is invalid');
        
        $this->assertEquals($messages, $rule->getMessages());
    }
    
    public function testRulesWithParameters()
    {
        $expected = [
            'date' => ['date_format:mm/dd/YYYY'],
            'age' => ['between:5,15'],
            'email' => ['unique:users,email_address,10'],
            'username' => ['exists:users,name,id,10']
        ];
        
        $rule = new Rule;
        $rule->add('date')->dateFormat('mm/dd/YYYY');
        $rule->add('age')->between(5, 15);
        $rule->add('email')->unique('users', 'email_address', 10);
        $rule->add('username')->exists('users', 'name', 'id', 10);
     
        $this->assertEquals($expected, $rule->get());
    }

    public function testExistsAndUniqueRules()
    {
        $expected = [
            'first_exists' => ['exists:users'],
            'second_exists' => ['exists:users,name'],
            'third_exists' => ['exists:users,name,id,10'],

            'first_unique' => ['unique:users'],
            'second_unique' => ['unique:users,email'],
            'third_unique' => ['unique:users,email,10'],
            'fourth_unique' => ['unique:users,email,10,id,account_id,1']
        ];

        $rule = new Rule;
        
        $rule->add('first_exists')->exists('users');
        $rule->add('second_exists')->exists('users', 'name');
        $rule->add('third_exists')->exists('users', 'name', 'id', 10);

        $rule->add('first_unique')->unique('users');
        $rule->add('second_unique')->unique('users', 'email');
        $rule->add('third_unique')->unique('users', 'email', 10);
        $rule->add('fourth_unique')->unique('users', 'email', 10, 'id', 'account_id', 1);
        
        $this->assertEquals($expected, $rule->get());
    }

    public function testUniqueExcludeIdIsNull()
    {
        $expected = [
            'email1' => ['unique:users,column_email,NULL'],
            'email2' => ['unique:users,column_email,NULL,column_id']
        ];

        $rule = new Rule;
        $rule->add('email1')->unique('users', 'column_email', null);
        $rule->add('email2')->unique('users', 'column_email', null, 'column_id');

        $this->assertEquals($expected, $rule->get());
    }

}
