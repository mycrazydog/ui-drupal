<div id="views-bootstrap-media-<?php print $id ?>" class="<?php print $classes ?>">
  <ul class="media-list">
    <?php foreach ($items as $key => $item): ?>
      <li class="media">
        
        <?php if ($options['alignment'] == 'left'): ?>      
	        	        
	        <?php if ($item['image_field']): ?>
	          <div class="media-left">
	            <?php print $item['image_field'] ?>
	          </div>
	        <?php endif ?> 
	        
            <div class="media-right">
              <?php if ($item['heading_field']): ?>
                <h4 class="media-heading">
                  <?php print $item['heading_field'] ?>
                </h4>
              <?php endif ?>
    
              <?php print $item['body_field'] ?>
            </div>
	        	        	               
        <?php endif ?>
        
        

        
        
        <?php if ($options['alignment'] == 'right'): ?>
        
        	        <div class="media-left">
        	          <?php if ($item['heading_field']): ?>
        	            <h3 class="media-heading">
        	              <?php print $item['heading_field'] ?>
        	            </h3>
        	          <?php endif ?>
        	
        	          <?php print $item['body_field'] ?>
        	        </div>
               
            
            <?php if ($item['image_field']): ?>
              <div class="media-right">
                <?php print $item['image_field'] ?>
              </div>
            <?php endif ?> 
            
            
            
                   
        <?php endif ?>        
        
      </li>
    <?php endforeach ?>
  </ul>
</div>
