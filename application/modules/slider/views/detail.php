<div class="row">
    <div class="col-md-6">
        <h4 ><b>ID:&nbsp;&nbsp;</b></h4><?php echo $user['id']; ?>
    </div>
    <div class="col-md-6">
        <h4 ><b>Status:&nbsp;&nbsp;</b></h4><?php echo $user['status']; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4 ><b>Title:&nbsp;&nbsp;</b></h4><?php echo $user['title']; ?>
    </div>
    <div class="col-md-6">
        <h4 ><b>Description 1:&nbsp;&nbsp;</b></h4><?php echo $user['description_1']; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4 ><b>Description 2:&nbsp;&nbsp;</b></h4><?php echo $user['description_2']; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4 ><b>Image:&nbsp;&nbsp;</b></h4><image src="<?php if(isset($user['image']) && !empty($user['image'])) { echo BASE_URL.SMALL_SLIDER_IMAGE_PATH. $user['image']; } else{ echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image";} ?>">
    </div>
</div>