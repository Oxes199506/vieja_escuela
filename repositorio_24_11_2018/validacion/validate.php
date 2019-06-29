<?php if(count($validate) > 0): ?>
 <div class="validate">
<?php foreach ($validate as $validate): ?>
	<p><?php echo $validate; ?></p>
<?php endforeach ?>
 </div>
 <?php endif ?>