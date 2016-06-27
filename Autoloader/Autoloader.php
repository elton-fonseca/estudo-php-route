<?php

/**
* Classe responsável pelo autoloader
*/
class Autoloader
{

    /**
   * Método que faz o registro do autoloader
   * @return void
   */
  public function registrar()
  {
      spl_autoload_register(array($this, 'loader'));
  }

  /**
   * Método que pega o nome da classe com namespace e inclui o arquivo
   * @param string $className 
   * @return void
   */
  public function loader($className)
  {
      $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

      $arquivo = $className . '.php';

      if (file_exists($arquivo)) {
          require_once($arquivo);
      } else {
          throw new Exception('O arquivo ' . $arquivo . ' não existe');
      }
  }
}
