<?php namespace Fadion\Rule;

class Rule
{

    /**
    * @static array Validation rules
    */
    protected static $rules = array();

    /**
    * @static array Messages
    */
    protected static $messages = array();

    /**
    * @static array Input attributes
    */
    protected static $attributes = array();

    /**
    * @var string Actual input
    */
    protected $input;

    /**
    * @var string Current rule
    */
    protected $currentRule;

    /**
    * Starts the rule builder with an
    * input target.
    * 
    * @param string $input
    * @param string|null $attribute
    * @return Rule
    */
    public function add($input, $attribute = null)
    {
        $this->input = $input;
        static::$rules[$input] = array();

        if (isset($attribute))
        {
            static::$attributes[$input] = $attribute;
        }

        return $this;
    }

    /**
    * Static factory.
    * 
    * @param string $input
    * @param string|null $attribute
    * @return Rule
    */
    public static function make($input, $attribute = null)
    {
        $rule = new static();

        return $rule->add($input, $attribute);
    }

    /**
    * Returns the array of rules.
    * 
    * @return array
    */
    public function get()
    {
        $rules = static::$rules;
        static::$rules = array();

        return $rules;
    }

    /**
    * Returns the array of messages.
    * 
    * @return array
    */
    public function getMessages()
    {
        $messages = static::$messages;
        static::$messages = array();

        return $messages;
    }

    /**
    * Returns the array of attributes.
    * 
    * @return array
    */
    public function getAttributes()
    {
        $attributes = static::$attributes;
        static::$attributes = array();

        return $attributes;
    }

    /**
    * Adds a message for the current rule.
    * 
    * @return Rule
    */
    public function message($message)
    {
        if (isset($this->currentRule))
        {
            static::$messages[$this->input.'.'.$this->currentRule] = $message;
        }

        return $this;
    }

    /**
    * Adds a rule to the ruleset.
    * 
    * @param string $rule 
    * @return void
    */
    protected function addRule($rule)
    {
        static::$rules[$this->input][] = $rule;

        $this->currentRule = $rule;
    }

    /*************************
    *    VALIDATION RULES    *
    *************************/

    /**
    * The field under validation must be yes, on, or 1.
    * This is useful for validating "Terms of Service" acceptance.
    *  
    * @return Rule
    */
    public function accepted()
    {
        $this->addRule('accepted');
        return $this;
    }

    /**
    * The field under validation must be a valid URL
    * according to the checkdnsrr PHP function.
    * 
    * @return Rule
    */
    public function active_url()
    {
        $this->addRule('active_url');
        return $this;
    }

    /**
    * The field under validation must be a valid URL
    * according to the checkdnsrr PHP function.
    * 
    * @return Rule
    */
    public function activeUrl()
    {
        return $this->active_url();
    }

    /**
    * The field under validation must be a value after a
    * given date. The dates will be passed into the PHP
    * strtotime function.
    * 
    * @param string $date
    * @return Rule
    */
    public function after($date)
    {
        $this->addRule("after:$date");
        return $this;
    }

    /**
    * The field under validation must be entirely
    * alphabetic characters.
    * 
    * @return Rule
    */
    public function alpha()
    {
        $this->addRule('alpha');
        return $this;
    }

    /**
    * The field under validation may have alpha-numeric
    * characters, as well as dashes and underscores.
    * 
    * @return Rule
    */
    public function alpha_dash()
    {
        $this->addRule('alpha_dash');
        return $this;
    }

    /**
    * The field under validation may have alpha-numeric
    * characters, as well as dashes and underscores.
    * 
    * @return Rule
    */
    public function alphaDash()
    {
        return $this->alpha_dash();
    }

    /**
    * The field under validation must be entirely
    * alpha-numeric characters.
    * 
    * @return Rule
    */
    public function alpha_num()
    {
        $this->addRule('alpha_num');
        return $this;
    }

    /**
    * The field under validation must be entirely
    * alpha-numeric characters.
    * 
    * @return Rule
    */
    public function alphaNum()
    {
        return $this->alpha_num();
    }

    /**
    * The field under validation must be of type array.
    * 
    * @return Rule
    */
    public function is_array()
    {
        $this->addRule('array');
        return $this;
    }

    /**
    * The field under validation must be of type array.
    * 
    * @return Rule
    */
    public function isArray()
    {
        return $this->is_array();
    }

    /**
    * The field under validation must be a value preceding
    * the given date. The dates will be passed into the PHP
    * strtotime function.
    * 
    * @param string $date
    * @return Rule
    */
    public function before($date)
    {
        $this->addRule("before:$date");
        return $this;
    }

    /**
    * The field under validation must have a size between
    * the given min and max. Strings, numerics, and files
    * are evaluated in the same fashion as the size rule.
    * 
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
     * The field under validation must be able to be cast
     * as a boolean. Accepted input are true, false, 1, 0,
     * "1" and "0".
     *
     * @return Rule
     */
    public function boolean()
    {
        $this->addRule("boolean");
        return $this;
    }

    /**
    * The field under validation must have a matching
    * field of foo_confirmation. For example, if the
    * field under validation is password, a matching
    * password_confirmation field must be present in
    * the input.
    * 
    * @return Rule
    */
    public function confirmed()
    {
        $this->addRule('confirmed');
        return $this;
    }

    /**
    * The field under validation must be a valid
    * date according to the strtotime PHP function.
    * 
    * @return Rule
    */
    public function date()
    {
        $this->addRule('date');
        return $this;
    }

    /**
    * The field under validation must match the
    * format defined according to the
    * date_parse_from_format PHP function.
    * 
    * @param string $format
    * @return Rule
    */
    public function date_format($format)
    {
        $this->addRule("date_format:$format");
        return $this;
    }

    /**
    * The field under validation must match the
    * format defined according to the
    * date_parse_from_format PHP function.
    * 
    * @param string $format
    * @return Rule
    */
    public function dateFormat($format)
    {
        return $this->date_format($format);
    }

    /**
    * The given field must be different than
    * the field under validation.
    * 
    * @param string $field
    * @return Rule
    */
    public function different($field)
    {
        $this->addRule("different:$field");
        return $this;
    }

    /**
    * The field under validation must be numeric
    * and must have an exact length of value.
    * 
    * @param string $value
    * @return Rule
    */
    public function digits($value)
    {
        $this->addRule("digits:$value");
        return $this;
    }

    /**
    * The field under validation must have a length
    * between the given min and max.
    * 
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
    * The field under validation must have a length
    * between the given min and max.
    * 
    * @param mixed $min
    * @param mixed $max
    * @return Rule
    */
    public function digitsBetween($min, $max)
    {
        return $this->digits_between($min, $max);
    }

    /**
    * The field under validation must be formatted
    * as an e-mail address.
    * 
    * @return Rule
    */
    public function email()
    {
        $this->addRule('email');
        return $this;
    }

    /**
    * The field under validation must exist on
    * a given database table.
    * 
    * @param string $table
    * @param string $column
    * @return Rule
    */
    public function exists($table, $column = null)
    {
        $rule = $table;

        // Take any argument after the 2 defined ones.
        $args = array_slice(func_get_args(), 2);

        if (isset($column))
        {
            $rule .= ",$column";
        }

        if ($args)
        {
            // Add optional arguments.
            foreach ($args as $arg)
            {
                $rule .= ",$arg";
            }
        }

        $this->addRule("exists:$rule");
        return $this;
    }

    /**
    * The file under validation must be an
    * image (jpeg, png, bmp, or gif).
    * 
    * @return Rule
    */
    public function image()
    {
        $this->addRule('image');
        return $this;
    }

    /**
    * The field under validation must be included
    * in the given list of values.
    * 
    * @param array $list
    * @return Rule
    */
    public function in(Array $list)
    {
        $this->addRule('in:'.implode(',', $list));
        return $this;
    }

    /**
    * The field under validation must have an integer value.
    * 
    * @return Rule
    */
    public function integer()
    {
        $this->addRule('integer');
        return $this;
    }

    /**
    * The field under validation must be formatted
    * as an IP address.
    * 
    * @return Rule
    */
    public function ip()
    {
        $this->addRule('ip');
        return $this;
    }

    /**
    * The field under validation must be less than
    * or equal to a maximum value. Strings, numerics,
    * and files are evaluated in the same fashion as
    * the size rule.
    * 
    * @param int $value
    * @return Rule
    */
    public function max($value)
    {
        $this->addRule("max:$value");
        return $this;
    }

    /**
    * The file under validation must have a MIME
    * type corresponding to one of the listed extensions.
    * 
    * @param array $list
    * @return Rule
    */
    public function mimes(Array $list)
    {
        $this->addRule('mimes:'.implode(',', $list));
        return $this;
    }

    /**
    * The field under validation must have a minimum
    * value. Strings, numerics, and files are evaluated
    * in the same fashion as the size rule.
    * 
    * @param int $value
    * @return Rule
    */
    public function min($value)
    {
        $this->addRule("min:$value");
        return $this;
    }

    /**
    * The field under validation must not be
    * included in the given list of values.
    * 
    * @param array $list
    * @return Rule
    */
    public function not_in(Array $list)
    {
        $this->addRule('not_in:'.implode(',', $list));
        return $this;
    }

    /**
    * The field under validation must not be
    * included in the given list of values.
    * 
    * @param array $list
    * @return Rule
    */
    public function notIn(Array $list)
    {
        return $this->not_in($list);
    }

    /**
    * The field under validation must have a numeric value.
    * 
    * @return Rule
    */
    public function numeric()
    {
        $this->addRule('numeric');
        return $this;
    }

    /**
    * The field under validation must match the given
    * regular expression.
    * 
    * @param string $pattern
    * @return Rule
    */
    public function regex($pattern)
    {
        $this->addRule("regex:$pattern");
        return $this;
    }

    /**
    * The field under validation must be present
    * in the input data.
    * 
    * @return Rule
    */
    public function required()
    {
        $this->addRule('required');
        return $this;
    }

    /**
    * The field under validation must be present if
    * the field field is equal to value.
    * 
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
    * The field under validation must be present if
    * the field field is equal to value.
    * 
    * @param string $field
    * @param string $value
    * @return Rule
    */
    public function requiredIf($field, $value)
    {
        return $this->required_if($field, $value);
    }

    /**
    * The field under validation must be present only
    * if any of the other specified fields are present.
    * 
    * @param array $list
    * @return Rule
    */
    public function required_with(Array $list)
    {
        $this->addRule('required_with:'.implode(',', $list));
        return $this;
    }

    /**
    * The field under validation must be present only
    * if any of the other specified fields are present.
    * 
    * @param array $list
    * @return Rule
    */
    public function requiredWith(Array $list)
    {
        return $this->required_with($list);
    }

    /**
    * The field under validation must be present only
    * if all of the other specified fields are present.
    * 
    * @param array $list
    * @return Rule
    */
    public function required_with_all(Array $list)
    {
        $this->addRule('required_with_all:'.implode(',', $list));
        return $this;
    }

    /**
    * The field under validation must be present only
    * if all of the other specified fields are present.
    * 
    * @param array $list
    * @return Rule
    */
    public function requiredWithAll(Array $list)
    {
        return $this->required_with_all($list);
    }

    /**
    * The field under validation must be present
    * only when any of the other specified fields
    * are not present.
    * 
    * @param array $list
    * @return Rule
    */
    public function required_without(Array $list)
    {
        $this->addRule('required_without:'.implode(',', $list));
        return $this;
    }

    /**
    * The field under validation must be present
    * only when any of the other specified fields
    * are not present.
    * 
    * @param array $list
    * @return Rule
    */
    public function requiredWithout(Array $list)
    {
        return $this->required_without($list);
    }

    /**
    * The field under validation must be present only
    * when the all of the other specified fields are
    * not present.
    * 
    * @param array $list
    * @return Rule
    */
    public function required_without_all(Array $list)
    {
        $this->addRule('required_without_all:'.implode(',', $list));
        return $this;
    }

    /**
    * The field under validation must be present only
    * when the all of the other specified fields are
    * not present.
    * 
    * @param array $list
    * @return Rule
    */
    public function requiredWithoutAll(Array $list)
    {
        return $this->required_without_all($list);
    }

    /**
    * The given field must match the field under validation.
    * 
    * @param string $field
    * @return Rule
    */
    public function same($field)
    {
        $this->addRule("same:$field");
        return $this;
    }

    /**
    * The field under validation must have a size matching
    * the given value. For string data, value corresponds
    * to the number of characters. For numeric data, value
    * corresponds to a given integer value. For files,
    * size corresponds to the file size in kilobytes.
    * 
    * @param param $value
    * @return Rule
    */
    public function size($value)
    {
        $this->addRule("size:$value");
        return $this;
    }

    /**
     * The field under validation must be a string type.
     *
     * @return Rule
     */
    public function string()
    {
        $this->addRule("string");
        return $this;
    }

    /**
     * The field under validation must be a valid timezone
     * identifier according to the timezone_identifiers_list
     * PHP function.
     *
     * @return Rule
     */
    public function timezone()
    {
        $this->addRule("timezone");
        return $this;
    }

    /**
    * The field under validation must be unique on a
    * given database table. If the column option is
    * not specified, the field name will be used.
    * 
    * @param string $table
    * @param string $column
    * @param mixed $id
    * @return Rule
    */
    public function unique($table, $column = null, $id = false)
    {
        $rule = $table;

        // Take any argument after the 3 defined ones.
        $args = array_slice(func_get_args(), 3);

        if (isset($column))
        {
            $rule .= ",$column";
        }

        // A NULL value is a valid one for the validator,
        // so an explicit FALSE is checked.
        if ($id !== false)
        {
            if ($id === null) {
                $rule .= ',NULL';
            } else {
                $rule .= ",$id";
            }
        }

        if ($args)
        {
            // Add optional arguments.
            foreach ($args as $arg)
            {
                $rule .= ",$arg";
            }
        }

        $this->addRule("unique:$rule");
        return $this;
    }

    /**
    * The field under validation must be formatted as an URL.
    * 
    * @return Rule
    */
    public function url()
    {
        $this->addRule('url');
        return $this;
    }

    /**
    * Run validation checks against a field only if that field
    * is present in the input array.
    * 
    * @return Rule
    */
    public function sometimes()
    {
        $this->addRule('sometimes');
        return $this;
    }

    /**
    * Handle custom rules.
    * 
    * @param string $name
    * @param array $args
    * @return Rule
    */
    public function __call($name, $args)
    {
        $rule = snake_case($name);

        if (count($args))
        {
            $rule .= ':';

            foreach ($args as $arg)
            {
                $rule .= ",$arg";
            }
        }

        $this->addRule($rule);
        return $this;
    }

}
