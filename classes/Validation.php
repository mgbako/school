<?php
class Validation
{
    private $_passed = false,
            $_errors = array(),
            $_db = null;


    public function __construct()
    {
        $this->_db = new Database();
    }

    public function check($source, $items = array(), $table=null, $column=null)
    {
        foreach($items as $item => $rules)
        {
            $value = trim($source[$item]);
            $item = escape($item);

            foreach($rules as $rule => $rule_value)
            {
                if($rule === 'required' && empty($value))
                {
                    $this->addError("($item) is required");
                }
                else if(!empty($value))
                {
                    switch($rule)
                    {
                        case 'min':
                            if(strlen($value) < $rule_value)
                            {
                                $this->addError("{$item} must be minimum of {$rule_value} Character");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $rule_value)
                            {
                                $this->addError("{$item} is greater than {$rule_value} Character");
                            }
                            break;
                        case 'matches':
                            if($value != $source[$rule_value])
                            {
                                $this->addError("{$rule_value} does not match your {$item}");
                            }
                            break;
                        case 'unique':
                            $this->_db->where($column, $value);
                            $check = $this->_db->get($table);
                            if($check)
                            {
                                $this->addError("{$item} Already Exist");
                            }
                            break;
                    }
                }
            }
        }

        if(empty($this->_errors))
        {
            $this->_passed = true;
        }
    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
         return $this->_passed;
    }

}