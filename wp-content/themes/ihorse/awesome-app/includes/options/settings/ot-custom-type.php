<?php

function ot_type_sequence( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    /* format setting outer wrapper */
   echo '<div class="sequence format-setting type-checkbox ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';    
         foreach ( (array) $field_settings as $key => $value)
	     {   switch ($value['type']) {
	 	        case 'textarea':
	 	           $code = (isset($field_value[esc_attr( $value['id'] )]))?$field_value[esc_attr( $value['id'] )]:esc_attr( $value['value'] ) ;
	 	           echo '<label for="'.esc_attr($field_id).'-'.esc_attr( $key ).'">Sequence code</label>';
	 	        	echo '<textarea class="textarea" rows="5" cols="40" name="' . esc_attr( $field_name ) . '[' . esc_attr( $value['id'] ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' .esc_textarea($code) . '</textarea>';
	 	        break;
	 	        case 'style':
					echo '<div style="display: inline-block">';
	 	            echo '<label for="'.esc_attr($field_id).'-'.esc_attr( $key ).'">Style: </label>';
	 	            echo '<select name="' . esc_attr( $field_name ) . '['.esc_attr( $value['id'] ).']" id="' . esc_attr( $field_id ) . '-'.esc_attr($key).'" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
		            foreach ( $value['arr'] as $style => $stext ) {
		               $current_style = (isset($field_value[esc_attr( $value['id'] )]))?$field_value[esc_attr( $value['id'] )]:esc_attr( $value['value'] ) ;
		              echo '<option value="' . esc_attr( $style ) . '" ' . selected( $current_style , $style, false ) . ' >' . esc_attr( $stext ) . '</option>';
		            }
		          echo '</select>';
		          echo '</div>';
	 	        break;

	 	        case 'animation':
					echo '<div style="display: inline-block">';
	 	            echo '<label for="'.esc_attr($field_id).'-'.esc_attr( $key ).'">Animation:</label>';
	 	            echo '<select name="' . esc_attr( $field_name ) . '['.esc_attr( $value['id'] ).']" id="' . esc_attr( $field_id ) . '-'.esc_attr($key).'" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
		            foreach ( $value['arr'] as $animation => $sanimation ) {
		               $current_animation = (isset($field_value[esc_attr( $value['id'] )]))?$field_value[esc_attr( $value['id'] )]:esc_attr( $value['value'] ) ;
		              echo '<option value="' . esc_attr( $animation ) . '" ' . selected( $current_animation , $animation, false ) . ' >' . esc_attr( $sanimation ) . '</option>';
		            }
		          echo '</select>';
		          echo '</div>';
	 	        break;

	 	        case 'speed':
					echo '<div style="display: inline-block">';
	 	            echo '<label for="'.esc_attr($field_id).'-'.esc_attr( $key ).'">Speed:</label>';
	 	            echo '<select name="' . esc_attr( $field_name ) . '['.esc_attr( $value['id'] ).']" id="' . esc_attr( $field_id ) . '-'.esc_attr($key).'" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
		            foreach ( $value['arr'] as $speed => $sspeed ) {
		               $current_speed = (isset($field_value[esc_attr( $value['id'] )]))?$field_value[esc_attr( $value['id'] )]:esc_attr( $value['value'] ) ;
		              echo '<option value="' . esc_attr( $speed ) . '" ' . selected( $current_speed , $speed, false ) . ' >' . esc_attr( $sspeed ) . '</option>';
		            }
		          echo '</select>';
		          echo '</div>';
	 	        break;
				
	 	        case 'delay':
					echo '<div style="display: inline-block">';
	 	            echo '<label for="'.esc_attr($field_id).'-'.esc_attr( $key ).'">Delay:</label>';
	 	            echo '<select name="' . esc_attr( $field_name ) . '['.esc_attr( $value['id'] ).']" id="' . esc_attr( $field_id ) . '-'.esc_attr($key).'" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';
		            foreach ( $value['arr'] as $delay => $sdelay ) {
		               $current_speed = (isset($field_value[esc_attr( $value['id'] )]))?$field_value[esc_attr( $value['id'] )]:esc_attr( $value['value'] ) ;
		              echo '<option value="' . esc_attr( $delay ) . '" ' . selected( $current_speed , $delay, false ) . ' >' . esc_attr( $sdelay ) . '</option>';
		            }
		          echo '</select>';
		          echo '</div>';
	 	        break;
 	        }
	     }
       
      echo '</div>';

    echo '</div>';
    
  }

  function ot_type_gfonts( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-gfont-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
    
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';
      
        /* build page select */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';
        
        /* query posts array */
       $fonts = dnt_gfontlist();
        
        /* has posts */
        if ( $fonts ) {
          echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
          foreach ($fonts->items as $key => $font) {
            echo '<option data-variants="'.implode(',', $font->variants).'" data-charsets="'.implode(',', $font->subsets).'"  value="' . esc_attr($font->family ).'"' . selected( esc_attr($field_value),  esc_attr($font->family), false ) . '>' . esc_attr($font->family) . '</option>';
          }
        } else {
          echo '<option value="">' . __( 'No Fonts Found', 'option-tree' ) . '</option>';
        }
        echo '</select>';
        
      echo '</div>';
      
    echo '</div>';
    
  }
