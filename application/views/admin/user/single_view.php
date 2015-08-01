<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <h1 class="text-center"><?php echo $this->data['page_title']; ?></h1>
    <?php echo $this->session->flashdata('message');?>
      <table class="table table-hover">
        <tr><th>Id</th><th>Repository Name</th><th>Edit</th></tr>
        <?php
        	$i = 1;
        	foreach ($this->data['repos'] as $key) {
            if(true){
              echo "<tr><td>".$i."</td><td>"
              .$key."</td><td>".
              anchor('admin/user/view/'.$key,'<span class="glyphicon glyphicon-pencil"></span>')."</td></tr>";          
            }else
        		  echo "<tr><td>".$i."</td><td>".$key."</td><td>"."</td></tr>";
        		$i++;
        	}
        ?>
      </table>
  </div>
</div>