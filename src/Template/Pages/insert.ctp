
  <div class="container mt-5 w-50 ">
  <?php 
    if($this->Flash->render('alert')){
        echo $this->Flash->render('alert');
    }
    ?>
  <div class="card">
    <div class="card-header text-center">
       <h3>Insert user</h3>
    </div>
    <div class="card-body">
        <?= $this->Form->create('insert',array('type'=>'post','action'=>'store')) ?>
        <div class="form-group">
            <?= $this->Form->input('name',array('type'=>'text','class'=>'form-control')) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('email',array('type'=>'email','class'=>'form-control'))?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('address',array('type'=>'text','class'=>'form-control')) ?>
        </div>
        
        <?= $this->Form->button('Submit',array('type'=>'submit','class'=>'btn btn-primary mt-2')) ?>
        <?= $this->Form->end()?>
    </div>
  </div>
  </div>
 
  