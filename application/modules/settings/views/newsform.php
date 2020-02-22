<div class="page-content-wrapper">
  <div class="page-content"> 
    <div class="content-wrapper">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3>
        <?php 
        if (empty($update_id)) 
                    $strTitle = 'Add settings';
                else 
                    $strTitle = 'Edit settings';
                    echo $strTitle;
                    ?>
                    <a href="<?php echo ADMIN_BASE_URL . 'settings'; ?>"><button type="button" class="btn btn-primary btn-lg pull-right"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;<b>Back</b></button></a>
       </h3>             
            
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless">
          <div class="tab-content">
          <div class="panel panel-default" style="margin-top:-30px;">
         
            <div class="tab-pane  active" >
              <div class="portlet box green ">
                
                <div class="portlet-body form " style="padding-top:15px;"> 
                  
                  <!-- BEGIN FORM-->
                        <?php
                        $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal');
                        if (empty($update_id)) {
                            $update_id = 0;
                        } else {
                        }
                        if (isset($hidden) && !empty($hidden))
                            echo form_open_multipart(ADMIN_BASE_URL . 'settings/submit/' . $update_id, $attributes, $hidden);
                        else
                            echo form_open_multipart(ADMIN_BASE_URL . 'settings/submit/' . $update_id, $attributes);
                        ?>
                  <div class="form-body">
                    
               <div class="row" style="margin-top:15px;">
                       <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                              $data = array(
                              'name' => 'slogan',
                              'id' => 'slogan',
                              'class' => 'form-control',
                              'type' => 'text',
                              'required' => 'required',
                              'tabindex' => '1',
                              'value' => $news['slogan'],
                              'data-parsley-maxlength'=>TEXT_BOX_RANGE
                              );
                              $attribute = array('class' => 'control-label col-md-4');
                              ?>
                          <?php echo form_label('Slogan', 'slogan', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?></div>
                        </div>
                      </div>
                     <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                            $data = array(
                            'name' => 'fb_link',
                            'id' => 'fb_link',
                            'class' => 'form-control',
                            'type' => 'text',
                            'tabindex' => '2',
                            'value' => $news['fb_link'],
                            'data-parsley-maxlength'=>TEXT_BOX_RANGE
                            );
                            $attribute = array('class' => 'control-label col-md-4');
                            ?>
                          <?php echo form_label('Facebook Link', 'fb_link', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                            $data = array(
                            'name' => 'phone',
                            'id' => 'phone',
                            'class' => 'form-control',
                            'type' => 'text',
                            'tabindex' => '3',
                            'value' => $news['phone'],
                            'data-parsley-maxlength'=>TEXT_BOX_RANGE
                            );
                            $attribute = array('class' => 'control-label col-md-4');
                            ?>
                          <?php echo form_label('Phone', 'phone', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div>
                       <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                              $data = array(
                              'name' => 'twitter_link',
                              'id' => 'twitter_link',
                              'class' => 'form-control',
                              'type' => 'text',
                              'required' => 'required',
                              'tabindex' => '4',
                              'value' => $news['twitter_link'],
                              'data-parsley-maxlength'=>TEXT_BOX_RANGE
                              );
                              $attribute = array('class' => 'control-label col-md-4');
                              ?>
                          <?php echo form_label('Twitter Link', 'twitter_link', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?></div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                       <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                              $data = array(
                              'name' => 'fax',
                              'id' => 'fax',
                              'class' => 'form-control',
                              'type' => 'text',
                              'required' => 'required',
                              'tabindex' => '5',
                              'value' => $news['fax'],
                              'data-parsley-maxlength'=>TEXT_BOX_RANGE
                              );
                              $attribute = array('class' => 'control-label col-md-4');
                              ?>
                          <?php echo form_label('Fax', 'fax', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?></div>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                            $data = array(
                            'name' => 'instagram_link',
                            'id' => 'instagram_link',
                            'class' => 'form-control',
                            'type' => 'text',
                            'tabindex' => '6',
                            'value' => $news['instagram_link'],
                            'data-parsley-maxlength'=>TEXT_BOX_RANGE
                            );
                            $attribute = array('class' => 'control-label col-md-4');
                            ?>
                          <?php echo form_label('Instagram Link', 'instagram_link', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                            $data = array(
                            'name' => 'email',
                            'id' => 'email',
                            'class' => 'form-control',
                            'type' => 'text',
                            'tabindex' => '7',
                            'value' => $news['email'],
                            'data-parsley-maxlength'=>TEXT_BOX_RANGE
                            );
                            $attribute = array('class' => 'control-label col-md-4');
                            ?>
                          <?php echo form_label('Email', 'email', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                            $data = array(
                            'name' => 'linkdin_link',
                            'id' => 'linkdin_link',
                            'class' => 'form-control',
                            'type' => 'text',
                            'tabindex' => '8',
                            'value' => $news['linkdin_link'],
                            'data-parsley-maxlength'=>TEXT_BOX_RANGE
                            );
                            $attribute = array('class' => 'control-label col-md-4');
                            ?>
                          <?php echo form_label('Linkdin Link', 'linkdin_link', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                              $data = array(
                              'name' => 'address',
                              'id' => 'address',
                              'class' => 'form-control',
                              'type' => 'text',
                              'required' => 'required',
                              'tabindex' => '9',
                              'value' => $news['address'],
                              'data-parsley-maxlength'=>TEXT_BOX_RANGE
                              );
                              $attribute = array('class' => 'control-label col-md-4');
                              ?>
                          <?php echo form_label('Address', 'address', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?></div>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                              $data = array(
                              'name' => 'pinterest_link',
                              'id' => 'pinterest_link',
                              'class' => 'form-control',
                              'type' => 'text',
                              'required' => 'required',
                              'tabindex' => '10',
                              'value' => $news['pinterest_link'],
                              'data-parsley-maxlength'=>TEXT_BOX_RANGE
                              );
                              $attribute = array('class' => 'control-label col-md-4');
                              ?>
                          <?php echo form_label('Pinterest Link', 'pinterest_link', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                            $data = array(
                            'name' => 'title_map',
                            'id' => 'title_map',
                            'class' => 'form-control',
                            'type' => 'text',
                            'tabindex' => '11',
                            'value' => $news['title_map'],
                            'data-parsley-maxlength'=>TEXT_BOX_RANGE
                            );
                            $attribute = array('class' => 'control-label col-md-4');
                            ?>
                          <?php echo form_label('Title Map', 'title_map', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                            $data = array(
                            'name' => 'google_lat',
                            'id' => 'google_lat',
                            'class' => 'form-control',
                            'type' => 'text',
                            'tabindex' => '12',
                            'value' => $news['google_lat'],
                            'data-parsley-maxlength'=>TEXT_BOX_RANGE
                            );
                            $attribute = array('class' => 'control-label col-md-4');
                            ?>
                          <?php echo form_label('Google Lat', 'google_lat', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-5">
                              <div class="form-group">
                                <?php
                                    $data = array(
                                    'name' => 'description_map',
                                    'id' => 'description_map',
                                    'class' => 'form-control',
                                    'type' => 'text',
                                    'required' => 'required',
                                    'tabindex' => '13',
                                    'value' => $news['description_map'],
                                    'data-parsley-maxlength'=>TEXT_BOX_RANGE
                                    );
                                    $attribute = array('class' => 'control-label col-md-4');
                                    ?>
                                <?php echo form_label('Description Map', 'description_map', $attribute); ?>
                                <div class="col-md-8"> <?php echo form_input($data); ?></div>
                              </div>
                            </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                              $data = array(
                              'name' => 'google_lng',
                              'id' => 'google_lng',
                              'class' => 'form-control',
                              'type' => 'text',
                              'required' => 'required',
                              'tabindex' => '14',
                              'value' => $news['google_lng'],
                              'data-parsley-maxlength'=>TEXT_BOX_RANGE
                              );
                              $attribute = array('class' => 'control-label col-md-4');
                              ?>
                          <?php echo form_label('Google Lng', 'google_lng', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?></div>
                        </div>
                      </div>
                      </div>
                       <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group last">
                                        <label class="control-label col-md-4">Image Upload<span style="color:red">*</span> </label>
                                        <div class="col-md-8">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <?
                                                    if (isset($news['image']) && !empty($news['image'])) {
                                                    ?>
                                                    <img src = "<?php echo base_url() . 'uploads/settings/medium_images/' . $news['image'] ?>" />
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                            </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileupload-new">
                                                        <i class="fa fa-paper-clip"></i> Select image
                                                    </span>
                                                    <span class="fileupload-exists">
                                                        <i class="fa fa-undo"></i> Change
                                                    </span>
                                                    <input type="file" name="news_file" id="news_file" class="default" />
                                                    <input required="" type="hidden" id="hdn_image" value="<?php if(isset($news['image'])) echo $news['image'] ?>" name="hdn_image"/>
                                                </span>
                                                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
                </div>


                  <div class="form-actions fluid no-mrg">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-offset-2 col-md-9" style="padding-bottom:15px;">
                       <span style="margin-left:40px"></span> <button type="submit" id="button1" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Save</button>
                        <a href="<?php echo ADMIN_BASE_URL . 'settings'; ?>">
                        <button type="button" class="btn green btn-default" style="margin-left:20px;"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                        </a> </div>
                    </div>
                  </div>
                </div>
                
                <?php echo form_close(); ?> 
                <!-- END FORM--> 
                
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<script>

$(document).ready(function() {
    $("#news_file").change(function() {
        var img = $(this).val();
        var replaced_val = img.replace("C:\\fakepath\\", '');
        $('#hdn_image').val(replaced_val);
    });
});
</script>