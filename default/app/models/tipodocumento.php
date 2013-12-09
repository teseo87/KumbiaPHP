<?php
class Tipodocumento extends ActiveRecord
{
   /**
     * Retorna los items para ser paginados
     *
     */
   public function getItems($page, $ppage=20)
   {
       return $this->paginate("page: $page", "per_page: $ppage", 'order: id desc');
   }
   
   /**
     * Método para obtener el nombre del tipo de documento
     */
    public static function getName($id) {
        $tipo = Load::model('tipodocumento')->find_first($id);
        return $tipo->nombre;
    }
}