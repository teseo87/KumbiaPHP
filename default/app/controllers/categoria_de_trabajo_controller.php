<?php
/**
 * Carga del modelo Categoria de Trabajo...
 */
Load::models('categoria_de_trabajo');
 
class CategoriaDeTrabajoController extends AppController {
    /**
     * Obtiene una lista para paginar las categorias
     */
    public function index($page=1) 
    {
        $cat = new CategoriaDeTrabajo();
        $this->listCategoriaDeTrabajo = $cat->getCategorias($page);
    }
 
    /**
     * Crea un Registro
     */
    public function create ()
    {
        /**
         * Se verifica si el usuario envio el form (submit) y si ademas 
         * dentro del array POST existe uno llamado "menus"
         * el cual aplica la autocarga de objeto para guardar los 
         * datos enviado por POST utilizando autocarga de objeto
         */
        if(Input::hasPost('categoria_de_trabajo')){
            /**
             * se le pasa al modelo por constructor los datos del form y ActiveRecord recoge esos datos
             * y los asocia al campo correspondiente siempre y cuando se utilice la convención
             * model.campo
             */
            $cat = new CategoriaDeTrabajo(Input::post('categoria_de_trabajo'));
            //En caso que falle la operación de guardar
            if($cat->create()){
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
        $cat = new CategoriaDeTrabajo();
 
        //se verifica si se ha enviado el formulario (submit)
        if(Input::hasPost('categoria_de_trabajo')){
 
            if($cat->update(Input::post('categoria_de_trabajo'))){
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Router::redirect();
            } else {
                Flash::error('Falló Operación');
            }
        } else {
            //Aplicando la autocarga de objeto, para comenzar la edición
            $this->categoria_de_trabajo = $cat->find_by_id((int)$id);
        }
    }
 
    /**
     * Eliminar una categoria
     * 
     * @param int $id (requerido)
     */
    public function del($id)
    {
        $cat = new CategoriaDeTrabajo();
        if ($cat->delete((int)$id)) {
                Flash::valid('Operación exitosa');
        }else{
                Flash::error('Falló Operación'); 
        }
 
        //enrutando por defecto al index del controller
        return Router::redirect();
    }
}
