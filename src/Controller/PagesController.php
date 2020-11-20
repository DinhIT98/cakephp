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
use Cake\ORM\TableRegistry;
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
    public function index(){
        // echo Router::url(['_name' => 'login']);
        $this->layout = false;
        // $this->viewBuilder()->setLayout('user');
        $this->loadModel('Users');
        $test=$this->Users->find();
        $data=['nguyen huu dinh','nguyen dinh cuong','nguyen minh hieu','tran ho tan phat', 'le hoai son'];
        $number= 100;
        $this->set(['data'=>$test,'number'=>$number]);
        // $this->render('add');
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
            $data=$this->Users->find('all',array('conditions'=>array('Users.name LIKE'=>'%'.$this->request->data['search'].'%')));
            $this->set('data',$data);
            $this->render('index');
        }else{
            dd('nguyen huu dinh');
        }
        
        
    }
    public function delete($id){

        $this->loadModel('Users');
        $entity=$this->Users->get($id);
        $this->Users->delete($entity);
        $this->redirect('/test');
        
    }
    public function insert(){
        $this->layout=false;
        // $data=$this->request->data;
        // dd($data);

    }
    public function store(){
        if($this->request->is('post')){
            $this->loadModel('Users');
            $user = $this->Users->newEntity();
            $user->name=$this->request->data['name'];
            $user->email=$this->request->data['email'];
            $user->address=$this->request->data['address'];
            if($this->Users->save($user)){
                $this->redirect('/test');
            }else{
                $this->Flash->set('insert data error !',['key'=>'alert']);
                $this->redirect('/insert');
            }
        
            
        }
        
    }
    public function edit($id){
        // $this->layout=false;
        $this->viewBuilder()->setLayout('user');
        $this->loadModel('Users');
        $data=$this->Users->find('all',array('conditions'=>array('Users.id'=>$id)));
        $this->set('data',$data);
        
    }
    public function update(){
        $this->loadModel('Users');
        $usersTable= TableRegistry::getTableLocator()->get('Users');
        $user = $usersTable->get($this->request->data['id']); 
        
        $user->name = $this->request->data['name'];
        $user->email=$this->request->data['email'];
        $user->address=$this->request->data['address'];
        $usersTable->save($user);
        $this->redirect('/index');
    }
}
