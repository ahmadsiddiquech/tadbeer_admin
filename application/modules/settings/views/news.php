<!-- Page content-->
<div class="content-wrapper">
    <h3>General Settings</h3>
    <div class="container-fluid">
        <!-- START DATATABLE 1 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover table-body">
                        <thead class="bg-th">
                        <tr class="bg-col">
                        <th class="sr">S.No</th>
                        <th>Slogan</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Fax</th>
                        <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                $i = 0;
                                if (isset($news)) {
                                    foreach ($news->result() as
                                            $new) {
                                        $i++;
                                        $edit_url = ADMIN_BASE_URL . 'settings/create/' . $new->id ;
                                        ?>
                                    <tr id="Row_<?=$new->id?>" class="odd gradeX " >

                                        <td width='2%'><?php echo $i;?></td>

                                        <td><?php echo $new->slogan  ?></td>
                                        <td><?php echo $new->phone  ?></td>
                                        <td><?php echo $new->email  ?></td>
                                        <td><?php echo $new->fax  ?></td>

                                        <td>
                                        <?php
                                        echo anchor($edit_url, '<i class="fa fa-edit"></i>', array('class' => 'action_edit btn blue c-btn','title' => 'Edit Setting'));
                                        ?>
                                        </td>
                                    </tr>
                                    <?php } ?>    
                                <?php } ?>
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>    

<script type="text/javascript">
$(document).ready(function(){

$(document).ready(function() {
        $("#news_file").change(function() {
            var img = $(this).val();
            var replaced_val = img.replace("C:\\fakepath\\", '');
            $('#hdn_image').val(replaced_val);
        });
    });
</script>