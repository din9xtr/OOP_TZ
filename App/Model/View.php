<?php
namespace App\Model;
class View
{
    protected array $data = [];
    public function __construct(array $data = [])
    {

        $this->data = $data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
        
    }


    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }
    public function __isset($name)
    {
        return isset($this->data[$name]);

    }
    public function render(string $template): string
    {
        extract($this->data);

        ob_start();

        include $template;
        return ob_get_clean();
    }
    public function display(string $template, array $data = [])
    {
        extract($data);
        include $template;
    }
}