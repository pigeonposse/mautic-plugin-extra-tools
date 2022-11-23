<?php

/**
 * ***********************************************************************
 * CMD in PHP Core class
 * ***********************************************************************
 **/

trait PigeonCiPHTML {

	/**
	 * Alert message
	 **/
	public function notification( 
		$text, 
		$type="warning" 
	) {

		?>
			<div class="alert alert-<?php echo $type; ?> col-md-6 col-md-offset-3 mt-md">
		    	<?php echo $text; ?>
		    </div>

	    <?php 

	}

	/**
	 * panel Html
	 **/
	public function panel( 
		$val
	) {

		echo '<div class="panel">';
			echo $val;
		echo '</div>';

	}

	/**
	 * column Html
	 **/
	public function column( 
		$val,
		$col = "12",
		$offset = "0"
	) {

		echo '<div class="col-md-'.$col.' col-md-offset-'.$offset.' mt-md">';
			echo $val;
		echo '</div>';

	}

	/**
	 * Header Html
	 **/
	public function header( 
		$text, 
		$desc = "" 
	) {

		?>

			<div class="page-header" >
				<h4>
				<strong><?php echo $text; ?></strong>
				</h4>
				<?php if ($desc) echo $desc; ?>
			</div>

	    <?php 

	}

	/**
	 * Return to list page Html
	 **/
	public function btn_return_to_list_page( 
		$text, 
		$url ="javascript:history.back(1)",
		$col = "12",
		$offset = "0"
	) {

		?>
			<div class="col-md-<?php echo $col; ?> col-md-offset-<?php echo $offset; ?> mt-md">
		        <a href="<?php echo $url; ?>" title="<?php echo $text; ?>">
		        	<?php echo $text; ?>
		        </a>
			</div>
	    <?php 

	}

	/**
	 * table Html
	 **/
	public function table( 
		$header, 
		$values
	) {

		?>

	    <div class="pr-md pl-md pb-md">
	        <div class="panel shd-none mb-0">
	            <table class="table table-bordered table-striped mb-0">
			        <thead>
			            <tr>
		                	<?php 
		                		foreach ( $header as $header_k => $header_v ) {
		                			echo '<th class="col-actions">';
			                			echo $header_v; 
			                		echo '</th>';
			                	}
		                	?>	               
			            </tr>
			        </thead>
			        <tbody>
						<?php
		            		foreach ($values as $value_k => $value_v) {
		            			echo '<tr>';
		            				foreach ( $header as $head_k => $head_v ) {
				            			echo '<td class="col-actions">';
				                			echo $value_v[$head_k]; 
				                		echo '</td>';
					                }
		                		echo '</tr>';
		                	}
						?>
					</tbody>
		    	</table>
			</div>
		</div>

		<?php

	}

}

