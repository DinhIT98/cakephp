<div class="container w-50 mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Register</h3>
        </div>
        <div class="card-body">
            <?= $this->Form->create(NULL,array('action'=>'/register'))?>
                <div class="form-group">
                    <div class="form-group">
                        <?= $this->Form->input('name',array('type'=>'text','placeholder'=>'name','label'=>false,'class'=>'form-control'))?>
                    </div>
                   <div class="form-group">
                        <?= $this->Form->input('email',array('type'=>'email','label'=>false,'class'=>'form-control','placeholder'=>'email','require'))?>
                   </div> 
                   <div class="form-group">
                       <?= $this->Form->input('address',array('type'=>'text','class'=>'form-control','placeholder'=>'address','label'=>false))?>
                   </div>
                   <div class="form-check form-check-inline">
                       <label for="gender" class="pr-3">Gender:</label>
                       <?= $this->Form->radio('gender',['Male'],array('class'=>'form-check-input', 'value'=>'Male'))?>
                   </div>
                   <div class="form-check form-check-inline">
                       <?= $this->Form->radio('gender',['Female'],array('class'=>'form-check-input','value'=>'Female'))?>
                   </div>
                   <div class="form-group">
                       <?= $this->Form->input('password',array('type'=>'password','label'=>false,'placeholder'=>'password','class'=>'form-control'))?>
                   </div>
                   <div class="form-group">
                       <?= $this->Form->input('re_pass',array('type'=>'password','label'=>false,'placeholder'=>'re-password','class'=>'form-control'))?>
                   </div>
                   <div class="form-group">
                       <?=$this->Form->button('Registers',array('class'=>'btn btn-success col-12'))?>
                   </div>
                   
                </div>
            <?= $this->Form->end()?>
        </div>
    </div>
</div>