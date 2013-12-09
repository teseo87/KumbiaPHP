<?php
/**
 * Carga del modelo.
 */
Load::models('oferta');
 
class OfertaController extends AppController {
    
    /**
     * Obtiene una lista de items para paginar
     */
    public function index($page=1) 
    {
        $item = new Oferta();
        $this->listItems = $item->getItems($page);
    }
 
    /**
     * Crea un Registro
     */
    public function create ()
    {
        
        
        /**
         * Se verifica si el usuario envio el form (submit) y si ademas 
         * dentro del array POST existe uno llamado "oferta"
         * el cual aplica la autocarga de objeto para guardar los 
         * datos enviado por POST utilizando autocarga de objeto
         */
        if(Input::hasPost('oferta')){
            /**
             * se le pasa al modelo por constructor los datos del form y ActiveRecord recoge esos datos
             * y los asocia al campo correspondiente siempre y cuando se utilice la convención
             * model.campo
             */
            $item = new Oferta(Input::post('oferta'));
            //En caso que falle la operación de guardar
            if($item->create()){
                Flash::valid('Operación exitosa');
                //Eliminamos el POST, si no queremos que se vean en el form
                Input::delete();
                return;               
            }else{
                Flash::error('Falló Operación');
            }
        }
    }
 
    /**
     * Edita un Registro
     *
     * @param int $id (requerido)
     */
    public function edit($id)
    {
        $item = new Oferta();
        
        //se verifica si se ha enviado el formulario (submit)
        if(Input::hasPost('oferta')){
 
            if($item->update(Input::post('oferta'))){
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Router::redirect();
            } else {
                Flash::error('Falló Operación');
            }
        } else {
            //Aplicando la autocarga de objeto, para comenzar la edición
            $this->oferta = $item->find_by_id((int)$id);
        }
    }
 
    /**
     * Eliminar una categoria
     * 
     * @param int $id (requerido)
     */
    public function del($id)
    {
        $item = new Oferta();
        if ($item->delete((int)$id)) {
                Flash::valid('Operación exitosa');
        }else{
                Flash::error('Falló Operación'); 
        }
 
        //enrutando por defecto al index del controller
        return Router::redirect();
    }
}
