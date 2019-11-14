<?php
include 'connection.php';

$id = $_REQUEST['field'];//print id
$value = $_REQUEST['query'];//textbox value

if($id == 'text')
{
	for($i = 1;$i <= $value;$i++)
	{
	?>		
		<div class="control-group">
                    <label class="control-label">Image <?php echo $i ?><span class="required">*</span></label>
                        <div class="controls">
                            <input class="input-fsile uniform_on" name="img<?php echo $i; ?>" type="file"/>
                        </div>
                 </div>
	<?php
	}
}
?>