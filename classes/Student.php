<?php
class Student
{
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $_isLoggedIn;

    public function __construct($student = null)
    {
        $this->_db = new Database();

        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');

        if(!$student)
        {
            if(Session::exists($this->_sessionName))
            {
                $student = Session::get($this->_sessionName);

                if($this->find($student))
                {
                    $this->_isLoggedIn = true;
                }
                else
                {

                }
            }
            else
            {
                $this->find($student);
            }
        }
    }

    public function create($fields = [])
    {
        if(!$this->_db->insert('students', $fields))
        {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function update($fields = [])
    {
        if(!$this->_db->update('students', $fields))
        {
            throw new Exception('There was a problem Updating an account.');
        }
    }

    public function find($student = null)
    {
        if($student)
        {
            $field = (is_numeric($student)) ? 'id' : 'username';
            $this->_db->where($field, $student);
            $data = $this->_db->get('students',1);

            if($data)
            {
                $this->_data = $data[0];
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null, $remember)
    {
        $user = $this->find($username);

        if($user)
        {

            if($this->data()['password'] == Hash::make($password, $this->data()['salt']))
            {
                Session::put($this->_sessionName, $this->data()['id']);

                if($remember)
                {
                    $hash = Hash::unique();
                    $this->_db->where('user_id', $this->data()['id']);
                    $hashCheck = $this->_db->get('sessions');


                    if(!$hashCheck)
                    {
                        $this->_db->insert('sessions', array(
                            'user_id' => $this->data()['id'],
                            'hash' => $hash
                        ));
                    }
                    else
                    {
                        $hash = $hashCheck;
                    }

                    Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                }
                return true;
            }
        }
        return false;
    }

    public function logout()
    {
        Session::delete($this->_sessionName);
    }

    public  function data()
    {
        return $this->_data;
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }
}