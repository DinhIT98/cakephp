<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
  <?= $this->Form->create('null',array('type'=>'post','action'=>'search')) ?>
   <div class="form-inline col-md-3 mb-3 pl-0">
      <?= $this->Form->input('search',array('type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Search')) ?>
     <button class="pb-2 pl-3 pr-3" type="submit"><i class="fa fa-search fa-lg"></i></button>
   </div>
   <?= $this->Form->end() ?>
  <table class=" table table-striped"> 
          <thead class="border">
            <tr>
              <th style="width=16px;">ID</th>
              <th >Name</th>
              <th >Email</th>
              <th>Address</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
        <?php foreach($data as $d): ?>
            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= $d['name']?></td>
                <td><?= $d['email']?></td>
                <td><?= $d['address']?></td>
                <td><a href="/edit/<?= $d['id']?>" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                <td><a href="/delete/<?= $d['id']?>" id= "<?= $d['id']?>" class="delete btn btn-danger"><i class="fa fa-trash"></i></a></td>
            </tr>
        <?php endforeach;?>
        </table>
  </div>
   
  
   
       
    
    
  
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    // <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </body>
</html>