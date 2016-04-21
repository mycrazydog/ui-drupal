 
	
	<div class="col-sm-2">		
		<!-- Post Image -->			
		<div class="article_thumb_large" style="padding-top:10px;">
			<?php
			//$filepath = '/'.strip_tags($fields['uri']->content);
			
			
			
			$contributor_name = $fields['meta_contributors']->content;
			
			//echo $filepath;
			
			if($fields['field_dir_photo']->content){
				echo '<img src="/'.$fields['field_dir_photo']->content.'" width="80" height="80"  alt="'.strip_tags($contributor_name).'" >';
			}else{
				
			}
			//print $fields['field_contributor_photo']->content;
			
				
			//$derivative_uri = image_style_path('w80xh80', $filepath);
			//echo $derivative_uri;
				
			//$filename = basename($filepath);
			//echo $filename;
			?>
			<div class="byline"><?php print $fields['meta_contributors']->content;?><br/><?php print $fields['changed']->content;?></div>
		</div>		
	</div>
		
	
	<div class="col-sm-10">	
		<h4><?php print $fields['title']->content;?></h4>	                               
		<div class="text">
			<?php print $fields['field_newsletter_blurb']->content;?>	
		</div>	
	</div>      
                            



