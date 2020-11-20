
  <div class="container mt-5 w-50 ">
  <?php 
    if($this->Flash->render('alert')){
        echo $this->Flash->render('alert');
    }
    ?>
    <?php foreach($data as $d):?>
    <div class="card">
        <div class="card-header text-center">
            <h3>Edit user</h3>
        </div>
        <div class="card-body">
            <?= $this->Form->create(NULL,array('type'=>'post','action'=>'/update')) ?>
                <?= $this->Form->input('id',array('type'=>'text','value'=>$d['id'],'hidden','label'=>false)) ?>
                <div class="form-group">
                    <?= $this->Form->input('name',array('type'=>'text','class'=>'form-control','value'=>$d['name'])) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('email',array('type'=>'email','class'=>'form-control','value'=>$d['email']))?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('address',array('type'=>'text','class'=>'form-control','value'=>$d['address'])) ?>
                </div>
                
                <?= $this->Form->button('Submit',array('type'=>'submit','class'=>'btn btn-primary mt-2')) ?>
                <?= $this->Form->end()?>
            </div>
            <?php endforeach ;?>
        </div>
    </div>
    
