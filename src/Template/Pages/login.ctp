<div class="container mt-5" style="width:400px">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Login</h3>
        </div>
        <div class="card-body pt-5">
           <?=$this->Form->create(NULL,array('action'=>'/login'))?>
           <div class="form-group">
               <?=$this->Form->input('email',array('label'=>false,'placeholder'=>'email','type'=>'email','class'=>'form-control'))?>
           </div>
           <div class="form-group">
               <?=$this->Form->input('pass',array('type'=>'password','placeholder'=>'password','label'=>false,'class'=>'form-control'))?>
           </div>
           <div class="form-group pt-3">
               <?=$this->Form->button('Login',array('class'=>'btn btn-success col-12'))?>
           </div>
           <?=$this->Form->end()?>
        </div>
    </div>
</div>