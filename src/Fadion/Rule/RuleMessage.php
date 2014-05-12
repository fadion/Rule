<?php namespace Fadion\Rule;

class RuleMessage
{

    /**
    * @static array Messages
    */
    private static $messages = array();

    /**
    * @var string Actual input
    */
    private $input;

    /**
    * Starts the message builder with an
    * input target.
    * 
    * @param string $input
    * @return RuleMessage
    */
    public function to($input)
    {
        $this->input = $input;

        return $this;
    }

    /**
    * Static factory.
    * 
    * @param string $input
    * @return RuleMessage
    */
    public static function make($input)
    {
        $rule = new static();

        return $rule->to($input);
    }

    /**
    * Returns the array of messages.
    * 
    * @return array
    */
    public function build()
    {
        $messages = static::$messages;
        static::$messages = array();

        return $messages;
    }

    /**
    * Adds a message to the message set.
    * 
    * @param string $rule 
    * @param string $message
    * @return void
    */
    private function addMessage($rule, $message)
    {
        static::$messages[$this->input.'.'.$rule] = $message;
    }

    /*************************
    *    VALIDATION RULES    *
    *************************/

    /**
    * The field under validation must be yes, on, or 1.
    * This is useful for validating "Terms of Service" acceptance.
    *  
    * @param string $message
    * @return RuleMessage
    */
    public function accepted($message)
    {
        $this->addMessage('accepted', $message);
        return $this;
    }

    /**
    * The field under validation must be a valid URL
    * according to the checkdnsrr PHP function.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function active_url($message)
    {
        $this->addMessage('active_url', $message);
        return $this;
    }

    /**
    * The field under validation must be a value after a
    * given date. The dates will be passed into the PHP
    * strtotime function.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function after($message)
    {
        $this->addMessage('after', $message);
        return $this;
    }

    /**
    * The field under validation must be entirely
    * alphabetic characters.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function alpha($message)
    {
        $this->addMessage('alpha', $message);
        return $this;
    }

    /**
    * The field under validation may have alpha-numeric
    * characters, as well as dashes and underscores.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function alpha_dash($message)
    {
        $this->addMessage('alpha_dash', $message);
        return $this;
    }

    /**
    * The field under validation must be entirely
    * alpha-numeric characters.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function alpha_num($message)
    {
        $this->addMessage('alpha_num', $message);
        return $this;
    }

    /**
    * The field under validation must be of type array.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function is_array($message)
    {
        $this->addMessage('array', $message);
        return $this;
    }

    /**
    * The field under validation must be a value preceding
    * the given date. The dates will be passed into the PHP
    * strtotime function.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function before($message)
    {
        $this->addMessage('before', $message);
        return $this;
    }

    /**
    * The field under validation must have a size between
    * the given min and max. Strings, numerics, and files
    * are evaluated in the same fashion as the size rule.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function between($message)
    {
        $this->addMessage('between', $message);
        return $this;
    }

    /**
    * The field under validation must have a matching
    * field of foo_confirmation. For example, if the
    * field under validation is password, a matching
    * password_confirmation field must be present in
    * the input.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function confirmed($message)
    {
        $this->addMessage('confirmed', $message);
        return $this;
    }

    /**
    * The field under validation must be a valid
    * date according to the strtotime PHP function.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function date($message)
    {
        $this->addMessage('date', $message);
        return $this;
    }

    /**
    * The field under validation must match the
    * format defined according to the
    * date_parse_from_format PHP function.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function date_format($message)
    {
        $this->addMessage('date_format', $message);
        return $this;
    }

    /**
    * The given field must be different than
    * the field under validation.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function different($message)
    {
        $this->addMessage('different', $message);
        return $this;
    }

    /**
    * The field under validation must be numeric
    * and must have an exact length of value.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function digits($message)
    {
        $this->addMessage('digits', $message);
        return $this;
    }

    /**
    * The field under validation must have a length
    * between the given min and max.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function digits_between($message)
    {
        $this->addMessage('digits_between', $message);
        return $this;
    }

    /**
    * The field under validation must be formatted
    * as an e-mail address.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function email($message)
    {
        $this->addMessage('email', $message);
        return $this;
    }

    /**
    * The field under validation must exist on
    * a given database table.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function exists($message)
    {
        $this->addMessage('exists', $message);
        return $this;
    }

    /**
    * The file under validation must be an
    * image (jpeg, png, bmp, or gif).
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function image($message)
    {
        $this->addMessage('image', $message);
        return $this;
    }

    /**
    * The field under validation must be included
    * in the given list of values.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function in($message)
    {
        $this->addMessage('in', $message);
        return $this;
    }

    /**
    * The field under validation must have an integer value.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function integer($message)
    {
        $this->addMessage('integer', $message);
        return $this;
    }

    /**
    * The field under validation must be formatted
    * as an IP address.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function ip($message)
    {
        $this->addMessage('ip', $message);
        return $this;
    }

    /**
    * The field under validation must be less than
    * or equal to a maximum value. Strings, numerics,
    * and files are evaluated in the same fashion as
    * the size rule.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function max($message)
    {
        $this->addMessage('max', $message);
        return $this;
    }

    /**
    * The file under validation must have a MIME
    * type corresponding to one of the listed extensions.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function mimes($message)
    {
        $this->addMessage('mimes', $message);
        return $this;
    }

    /**
    * The field under validation must have a minimum
    * value. Strings, numerics, and files are evaluated
    * in the same fashion as the size rule.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function min($message)
    {
        $this->addMessage('min', $message);
        return $this;
    }

    /**
    * The field under validation must not be
    * included in the given list of values.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function not_in($message)
    {
        $this->addMessage('not_in', $message);
        return $this;
    }

    /**
    * The field under validation must have a numeric value.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function numeric($message)
    {
        $this->addMessage('numeric', $message);
        return $this;
    }

    /**
    * The field under validation must match the given
    * regular expression.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function regex($message)
    {
        $this->addMessage('regex', $message);
        return $this;
    }

    /**
    * The field under validation must be present
    * in the input data.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function required($message)
    {
        $this->addMessage('required', $message);
        return $this;
    }

    /**
    * The field under validation must be present if
    * the field field is equal to value.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function required_if($message)
    {
        $this->addMessage('required_if', $message);
        return $this;
    }

    /**
    * The field under validation must be present only
    * if any of the other specified fields are present.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function required_with($message)
    {
        $this->addMessage('required_with', $message);
        return $this;
    }

    /**
    * The field under validation must be present only
    * if all of the other specified fields are present.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function required_with_all($message)
    {
        $this->addMessage('required_with_all', $message);
        return $this;
    }

    /**
    * The field under validation must be present
    * only when any of the other specified fields
    * are not present.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function required_without($message)
    {
        $this->addMessage('required_without', $message);
        return $this;
    }

    /**
    * The field under validation must be present only
    * when the all of the other specified fields are
    * not present.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function required_without_all($message)
    {
        $this->addMessage('required_without_all', $message);
        return $this;
    }

    /**
    * The given field must match the field under validation.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function same($message)
    {
        $this->addMessage('same', $message);
        return $this;
    }

    /**
    * The field under validation must have a size matching
    * the given value. For string data, value corresponds
    * to the number of characters. For numeric data, value
    * corresponds to a given integer value. For files,
    * size corresponds to the file size in kilobytes.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function size($message)
    {
        $this->addMessage('size', $message);
        return $this;
    }

    /**
    * The field under validation must be unique on a
    * given database table. If the column option is
    * not specified, the field name will be used.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function unique($message)
    {
        $this->addMessage('unique', $message);
        return $this;
    }

    /**
    * The field under validation must be formatted as an URL.
    * 
    * @param string $message
    * @return RuleMessage
    */
    public function url($message)
    {
        $this->addMessage('url', $message);
        return $this;
    }

}