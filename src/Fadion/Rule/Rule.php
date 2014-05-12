<?php namespace Fadion\Rule;

class Rule
{

    /**
    * @static array Validation rules
    */
    private static $rules = array();

    /**
    * @var string Actual input
    */
    private $input;

    /**
    * Starts the rule builder with an
    * input target.
    * 
    * @param string $input
    * @return Rule
    */
    public function to($input)
    {
        $this->input = $input;
        static::$rules[$input] = array();

        return $this;
    }

    /**
    * Static factory.
    * 
    * @param string $input
    * @return Rule
    */
    public static function make($input)
    {
        $rule = new static();

        return $rule->to($input);
    }

    /**
    * Returns the array of rules.
    * 
    * @return array
    */
    public function build()
    {
        $rules = static::$rules;
        static::$rules = array();

        return $rules;
    }

    /**
    * Alias of build().
    * Just for fun :)
    * 
    * @return array
    */
    public function theWorld()
    {
        return $this->build();
    }

    /**
    * Adds a rule to the ruleset.
    * 
    * @param string $rule 
    * @return void
    */
    private function addRule($rule)
    {
        static::$rules[$this->input][] = $rule;
    }

    /**************************
    *     Validation Rules    *
    **************************/

    /**
    * @return Rule
    */
    public function accepted()
    {
        $this->addRule('accepted');
        return $this;
    }

    /**
    * @return Rule
    */
    public function active_url()
    {
        $this->addRule('active_url');
        return $this;
    }

    /**
    * @param string $date
    * @return Rule
    */
    public function after($date)
    {
        $this->addRule("after:$date");
        return $this;
    }

    /**
    * @return Rule
    */
    public function alpha()
    {
        $this->addRule('alpha');
        return $this;
    }

    /**
    * @return Rule
    */
    public function alpha_dash()
    {
        $this->addRule('alpha_dash');
        return $this;
    }

    /**
    * @return Rule
    */
    public function alpha_num()
    {
        $this->addRule('alpha_num');
        return $this;
    }

    /**
    * @return Rule
    */
    public function is_array()
    {
        $this->addRule('array');
        return $this;
    }

    /**
    * @param string $date
    * @return Rule
    */
    public function before($date)
    {
        $this->addRule("before:$date");
        return $this;
    }

    /**
    * @param mixed $min
    * @param mixed $max
    * @return Rule
    */
    public function between($min, $max)
    {
        $this->addRule("between:$min,$max");
        return $this;
    }

    /**
    * @return Rule
    */
    public function confirmed()
    {
        $this->addRule('confirmed');
        return $this;
    }

    /**
    * @return Rule
    */
    public function date()
    {
        $this->addRule('date');
        return $this;
    }

    /**
    * @param string $format
    * @return Rule
    */
    public function date_format($format)
    {
        $this->addRule("date_format:$format");
        return $this;
    }

    /**
    * @param string $field
    * @return Rule
    */
    public function different($field)
    {
        $this->addRule("different:$field");
        return $this;
    }

    /**
    * @param string $value
    * @return Rule
    */
    public function digits($value)
    {
        $this->addRule("digits:$value");
        return $this;
    }

    /**
    * @param mixed $min
    * @param mixed $max
    * @return Rule
    */
    public function digits_between($min, $max)
    {
        $this->addRule("digits_between:$min,$max");
        return $this;
    }

    /**
    * @return Rule
    */
    public function email()
    {
        $this->addRule('email');
        return $this;
    }

    /**
    * @return Rule
    */
    public function exists()
    {
        $this->addRule('exists:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @return Rule
    */
    public function image()
    {
        $this->addRule('image');
        return $this;
    }

    /**
    * @return Rule
    */
    public function in()
    {
        $this->addRule('in:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @return Rule
    */
    public function integer()
    {
        $this->addRule('integer');
        return $this;
    }

    /**
    * @return Rule
    */
    public function ip()
    {
        $this->addRule('ip');
        return $this;
    }

    /**
    * @param int $value
    * @return Rule
    */
    public function max($value)
    {
        $this->addRule("max:$value");
        return $this;
    }

    /**
    * @return Rule
    */
    public function mimes()
    {
        $this->addRule('mimes:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @param int $value
    * @return Rule
    */
    public function min($value)
    {
        $this->addRule("min:$value");
        return $this;
    }

    /**
    * @return Rule
    */
    public function not_in()
    {
        $this->addRule('not_in:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @return Rule
    */
    public function numeric()
    {
        $this->addRule('numeric');
        return $this;
    }

    /**
    * @param string $pattern
    * @return Rule
    */
    public function regex($pattern)
    {
        $this->addRule("regex:$pattern");
        return $this;
    }

    /**
    * @return Rule
    */
    public function required()
    {
        $this->addRule('required');
        return $this;
    }

    /**
    * @param string $field
    * @param string $value
    * @return Rule
    */
    public function required_if($field, $value)
    {
        $this->addRule("required_if:$field,$value");
        return $this;
    }

    /**
    * @return Rule
    */
    public function required_with()
    {
        $this->addRule('required_with:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @return Rule
    */
    public function required_with_all()
    {
        $this->addRule('required_with_all:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @return Rule
    */
    public function required_without()
    {
        $this->addRule('required_without:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @return Rule
    */
    public function required_without_all()
    {
        $this->addRule('required_without_all:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @param string $field
    * @return Rule
    */
    public function same($field)
    {
        $this->addRule("same:$field");
        return $this;
    }

    /**
    * @param param $value
    * @return Rule
    */
    public function size($value)
    {
        $this->addRule("size:$value");
        return $this;
    }

    /**
    * @return Rule
    */
    public function unique()
    {
        $this->addRule('unique:'.implode(',', func_get_args()));
        return $this;
    }

    /**
    * @return Rule
    */
    public function url()
    {
        $this->addRule('url');
        return $this;
    }

}