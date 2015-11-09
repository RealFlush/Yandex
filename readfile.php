<?php

final class FileReader
{
    protected $handler = null;
    protected $fbuffer = "";
    
    
    /**
     * Конструктор класса, открывающий файл для работы
     *
     * @param string $filename
     */
    public function __construct($filename)
    {
        if(!($this->handler = fopen($filename, "rb")))
            throw new Exception("Cannot open the file");
    }
    
    
    /**
     * Построчное чтение всего файла с учетом сдвига
     *
     * @return string
     */
    public function ReadAll()
    {
        if(!$this->handler)
            throw new Exception("Invalid file pointer");
        
        while(!feof($this->handler))
            $this->fbuffer .= fgets($this->handler);
        
        return $this->fbuffer;
    }
    
public function Read($count_line = 10) 
{ 
if(!$this->handler) 
throw new Exception("Invalid file pointer"); 

while(!feof($this->handler)) 
{ 
$this->fbuffer[] = fgets($this->handler); 
$count_line--; 
if($count_line == 0) break; 
} 

return $this->fbuffer; 
}     
    /**
     * Установить строку, с которой производить чтение файла
     *
     * @param int  $line
     */
    public function SetOffset($line)
    {
        if(!$this->handler)
            throw new Exception("Invalid file pointer");
        
        while(!feof($this->handler) && $line--) {
            fgets($this->handler);
        }
    }
};

/**
 * Пример использования 
 */
//$stream = new FileReader("lines.txt");

// Укажем, что читать надо с 20-ой строки
//$stream->SetOffset(20);

// Получаем содержимое
//$stream->ReadAll();

/**
 * Количество прочитанных строк можно узнать так:
 *
 * echo count(explode("\n", $stream->ReadAll()));
 */


?>