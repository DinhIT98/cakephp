<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Routing\Router;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(...$path)
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
    public function test(){
        // echo Router::url(['_name' => 'login']);
        $this->layout = false;
        $this->loadModel('Users');
        $test=$this->Users->find();
        $data=['nguyen huu dinh','nguyen dinh cuong','nguyen minh hieu','tran ho tan phat', 'le hoai son'];
        $number= 100;
        $this->set(['data'=>$test,'number'=>$number]);
        $this->render('add');
    }
    public function demo (){
        $this->loadModel('Users');
        $data=$this->Users->find('all');
        dd($data);
    }
    public function Search(){
        $this->layout = false;
        if($this->request->is('post')){
            $this->loadModel('Users');
            // $data=$this->request->data;
            $data=$this->Users->find('all',array('conditions'=>array('Users.name LIKE'=>'%'.$this->request->data['search'].'%')));
            
            // echo $data;
            $this->set('data',$data);
            $this->render('add');
        }else{
            dd('nguyen huu dinh');
        }
        // $token = $this->request->getParam('_csrfToken');
        // dd($token);
        
    }
    public function delete($id){
        // dd($id);
        $this->loadModel('Users');
        $this->Users->delete('id',$id);
        // $this->layout=falste;
        // $id=$this->request->data;
        // $this->loadModel('User');
        // $id =$this->request->data['id'];
        
    }
}
