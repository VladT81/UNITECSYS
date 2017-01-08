<?php

class poland_not
{
    public $ret;
    public $stack = array();
    private $oper = ['+', '-', '*', '/'];

    /*метод для вычисления
     *
     * */
    public function __construct($str)
    {
        //проверка типа данных
        if(gettype($str)!= "string") new Exception('Wrong type');

        // подчищаем строку и делим ее на "стек"
        $str = trim($str);
        while (strrpos($str, " ")){
            $str = preg_replace("/ /", "", $str);
        }
        //создаем стек
        for($i=0; $i<strlen($str); $i++){
            $this->stack[$i] = $str[$i];
        }
    }

    private function calc()
    {

        $cnt=count($this->stack);
        for ($i=0; $i<$cnt; $i++) {
            if (in_array($this->stack[$i], $this->oper)) {
                //проверка на правильность
                if ($i<2) return new Exception('Wrong type');
                // выполнить операцию, записать в "стек" результат
                eval('$this->stack[$i] = $this->stack[($i-2)]'.$this->stack[$i].'$this->stack[($i-1)];');
                // изъять из "стека" операнды
                unset($this->stack[($i-1)]);
                unset($this->stack[($i-2)]);
                $this->stack = array_values($this->stack);
                // откат цикла
                $i=0;
                $cnt=count($this->stack);
            }
        }
        return $this->stack[0];
    }

    public function answer()
    {
        $this->ret = $this->calc();
        return $this->ret;
    }


    /*метод для добавления математических операций
     *
     * */
    public function add_oper ($oper_str)
    {
        $this->oper = array_push($this->oper, $oper_str);
    }
}