<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <h1 class="text-center">Create</h1>
    <?php echo $this->session->flashdata('message');?>
    <?php echo form_open_multipart('',array('class'=>'form-horizontal'));?>
      <div class="form-group">
        <?php echo form_label('Repos','identity');?>
        <?php echo form_error('identity');?>
        <?php echo form_input('identity','','class="form-control"');?>
      </div>
      <?php echo form_submit('submit', 'Upload', 'class="btn btn-primary btn-lg btn-block"');?>
    <?php echo form_close();?>
  </div>
</div>