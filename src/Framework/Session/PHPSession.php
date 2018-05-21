<?php

namespace Framework\Session;


class PHPSession implements SessionInterface {

/**
 * assure que la session est démarrée
 * @param  string $value [description]
 * @return [type]        [description]
 */
private function ensureSession($value='') {
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }

}


/**
 * Récupère une information en session
 * @param  string $key
 * @param  mixed $default
 * @return mixed
*/
public function get(string $key, $default = null)
{
    $this->ensureSession();
    if(array_key_exists($key, $_SESSION)){
      return $_SESSION[$key];
    }
    return $default;
}


/**
 * Ajoute une information en session
 * @param string $key
 * @param $value
 * @return mixed
 */
public function set(string $key, $value)
 {
   $this->ensureSession();
   $_SESSION[$key]=$value;
 }
/**
 * Supprimer une clef
 * @param string $key
 */
public function delete(string $key)
 {
   $this->ensureSession();
   unset($_SESSION[$key]);
 }

}