	    <section class="panel">
		    <header class="panel-heading">
				 Gallery Details
			</header>
			<?php print_r($store);
            echo $before->id;?>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editgallerysubmit');?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
					<?php if($before->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description',$before->description);?>">
				  </div>
				</div>
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('brand',$brand,set_value('brand',$before->brandid),'id="select2" onChange="changestore()" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					
					<div id="store" class="form-group">
                <label class="col-sm-2 control-label">Store Name</label>
                <div class="col-sm-4">
                   <?php
                    
    $options = array();

                        foreach($store as $storesname){
                        $options[$storesname->id] = $storesname->name;
                           
                        }
                    
                echo form_dropdown('storeid',$options,set_value('storeid',$before->storeid),'id="select1" class="form-control populate placeholder select2-                      offscreen"');

                ?>
                    </div></div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewmall'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>

<script>
                    function changestore(){
                       //alert($('#select3').val());
                        
                        $.get( 
                             "<?php echo base_url(); ?>index.php/site/getstore/"+$('#select2').val(),
                             { id: "123" },
                             function(data) {
                             //  alert(data);
                                $("#store").html(data);
                             }

                          );
                        
                        }
 </script>