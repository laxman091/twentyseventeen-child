<?php
/*
Template Name: My Choices
*/
get_header('myheader');
?>
<!DOCTYPE html>
<html>
<head>
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->
<style>
.selected {
    1px solid #f00;
}

ul { list-style: none; }
ul li { display: inline; } 
ul li img { border: 2px solid white; cursor: pointer; }
ul li img:hover,
ul li img.hover { border: 2px solid black; }

.filled-circle {
  padding: 2px 11px;
  border-radius: 100%;
  background-color: #f38e23;
}

 #redcircle {
      width: 50px;
      height: 50px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: red;
    }
     #greencircle {
      width: 50px;
      height: 50px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: green;
    }
     #bluecircle {
      width: 50px;
      height: 50px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: blue;
    }
    .colordiv
    {
    display:inline-block;}
    blockquote{
display:none;    
    }
    .wp-embed .post-23 .page .type-page .status-publish .has-post-thumbnail .hentry{
    	display: none;
    }
    iframe
    {
    	    	display: none;
    }


</style>
<script>
jQuery(document).ready(function($) {
	$(window).scrollTop(0);
	$("#es_txt_button_pg").addClass("addmysubmit");
	
	//$('.noproduct').html('No Product Found...');
	
	var allowshow=true;	// 'es_msg_pg' collect string from this id to show next screen (i.e. category selection)
	
	var emailid;
	var pickimage;
	var category;
	var category_name = [];
	var colorname = [];
	var colorcode;
	var picksize;
	var pattern_id;
	var pattern_name = [] ;
	
	//$('#es_txt_button_pg').click
	
	
	$(document).on('click','.btnnext',function(){
		$(window).scrollTop(0);
		
		
		if (allowshow == false) {
			//$("#es_txt_email_pg").addClass("addborder");
			//$("#es_txt_email_pg").css('background': 'yellow','color': '#000','border': '1px solid red');
			alert('Please subscribe first!');			
			$("#es_txt_email_pg").focus();
			return;
			
		}
		else {
		
		$('.email-content').hide();
		
		$('.category-content').show('fast');	// now show category if subscribe submit		
		}
		
	});
	
	$('.addmysubmit').click(function () {
		var check_mesg = $('#es_msg_pg').text();
		if (check_mesg !='' ) {
		allowshow = true;	
		}
		
	});
	
		$(document).on('click','.btncategoryprev',function(){
			$(window).scrollTop(0);
		//alert('previous');
		$('.category-content').hide();
		$('#es_msg_pg').text('');
		$('.email-content').show('fast');
		alert('Please subscribe first...');
		$('#es_txt_email_pg').focus();
		
		});
	
	$(document).on('click','.btncategory',function(){
		$(window).scrollTop(0);
		//alert('show color now after category');
		$('.category-content').hide();
		$('.color-content').show('fast');
		
		});
		
		$("circle").click(function() {
			var current_elem= $(this);
			var current_elem_name = $(this).attr('name');
  		if (current_elem.hasClass('selectclass')) {
  			//alert('test');
  			$(this).removeClass('selectclass');
  			var index = colorname.indexOf(current_elem_name);
  							if (index > -1) {
    						colorname.splice(index, 1);
							}
							//alert(colorname);
  		}
  		else {
			$(this).addClass('selectclass');
			$(window).scrollTop(0);
			//colorname = $(this).attr('name');
			colorname.push(current_elem_name);			
			colorcode =$(this).attr('fill');
			color_taxonomy = $(this).attr('stroke');
			//alert(colorname);
			//alert('Color name :' + colorname + 'Color code: ' + colorcode + 'taxonomy id: ' + color_taxonomy ); 
    //$('.product-content').show('fast');
    }     
  });
  
  $(document).on('click','.btnprintprev',function(){
  	$(window).scrollTop(0);
  	//alert('previous');
	$('.color-content').hide();  	
  	$('.category-content').show('fast');
  	
  });
  
  $(document).on('click','.btnprint',function(){
  	$(window).scrollTop(0);
  	//alert('a');
  	$('.color-content').hide();
  	$('.print-content').show('fast');
  });
  
   $('.btnproductprev').click(function () {
   	$(window).scrollTop(0);
    	//alert('previous');
		$('.print-content').hide();    	
    	$('.color-content').show('fast');
    });
  
  
    $('.btnproduct').click(function () {
    	$(window).scrollTop(0);
    	//alert('b');
    	$('.print-content').hide();
    	$('.product-content').show('fast');
    	
    	if (category =="" || category_name == "" || colorname == "" || pattern_name == "") {
   		/*var emailid; var pickimage; var category;var category_name;var colorname;var colorcode;var picksize;var pattern_id;var pattern_name;*/
   		//$('#show_product_here').html('<font color="red">You have no select any parameter to search the product. Please select first...</font>');
   		//return;
   		//exit();
   
    	}
    	
    	//var dataString = "email="+emailid+"&category="+category+"&color="+colorname+"&patternid="+pattern_id;
       	
    	/*Ajax end*/
    	$.ajax(
       {
           type: 'POST',
           url: "/wp-admin/admin-ajax.php?action=showproduct_choices",	// this showproduct_choices action(i.e. function) is defined in functions.php
           //dataType: 'json',
           cache: false,
           data:{'email': emailid, 'cat_name':category_name, 'category' : category, 'color':colorname , 'patternid':pattern_id, 'patternname': pattern_name },
           success: function(response)
           {
           	//alert(response);
           	if(response == "") {
        		//alert('empty');
        		//$('#show_product_here').html('<font color="red">You have no selected any parameter to search the product. Please select first...</font>');
        		//return;
    			}
    			  //alert('success' + response);
              //$('.product-content').show('fast');
              $('#show_product_here').html(response);

           },
           error: function(xhr, textStatus, errorThrown)
           {
               alert('error');
           }
});
    	    	
  	//$('.product-content').show('fast');
  	
  });
  
     $('.productprevious').click(function () {
     	$(window).scrollTop(0);
    	//alert('previous');
		$('.product-content').hide();    	
    	$('.print-content').show('fast');
    });
  
  //$('.btnjoin').click(function () {	es_txt_button_pg
  /*$('#es_txt_button_pg').click(function () {
  	$(window).scrollTop(0);
  	//alert('subscribe');
  	$('.subscribermsg').show('fast');				//.fadeIn(10000);
  	//$("#emailid").val('');
  	$("#es_txt_email_pg").prop('disabled', true);
  	$(this).prop("disabled",true);
  	
	$.ajax(
       {
           type: 'POST',
           url: "/wp-admin/admin-ajax.php?action=subscriber_newslatter",	// this subscriber_newslatter action(i.e. function) is defined in functions.php
           cache: false,
           data:{'email': $("#es_txt_email_pg").val()},
           success: function(response)
           {
             alert(response);

           },
           error: function(xhr, textStatus, errorThrown)
           {
               alert('error in subscribe');
           }
		});  	
  	
  });*/
  
  $('.showproduct').click(function () {
  	$(window).scrollTop(0);
  	//alert('Email: ' + emailid + '- Category: ' + category + '- Color: ' + colorname );
  	$('.product-content').show('fast');
  });
  
	
    $(".categoryimage").click(function() {
    	$(window).scrollTop(0);
    	var current_elem= $(this);
    	var current_elem_name = $(this).attr('name');
  		
  		if (current_elem.hasClass('selectclass')) {
  		
  			current_elem.removeClass('selectclass');
  			var index = category_name.indexOf(current_elem_name);
  							if (index > -1) {
    						category_name.splice(index, 1);
							}
							//alert(category_name);
  		}
  		else {
		$(this).addClass("selectclass");    
    	category = $(this).attr('id');
    	//category_name = $(this).attr('name');
    	category_name.push(current_elem_name);
    	//alert(category_name);     
    $(this).toggleClass("hover");
    //alert('Category Name: ' +category_name +' ID: ' + category); 
    }    
  });
  
  //$('printpattern.attachment-thumbnail').click(function () {
  	$('.printpattern').click(function () {
  		$(window).scrollTop(0);
  		var current_elem= $(this);
  		var current_elem_name = $(this).attr('name');
  		
  		if (current_elem.hasClass('selectclass')) {
  		
  			current_elem.removeClass('selectclass');
  			var index = pattern_name.indexOf(current_elem_name);
  							if (index > -1) {
    						pattern_name.splice(index, 1);
							}
							//alert(pattern_name);
  		}
  		else {
  				current_elem.addClass("selectclass");
  				pattern_id = $(this).attr('id');
  				pattern_name.push(current_elem_name);
  				//pattern_name = $(this).attr('name');
  				//alert(pattern_name);
	  			
  		}
  		
  	
  });

  $("#btn").click(function() {      
    var imgs = $("img.hover").length;    
    //alert('there are ' + imgs + ' images selected');        
  });
});
</script>


</head>
<body>

<div class="email-content" align="center">
<div class="tophdr">
<h3 class="s-quz-b-txt">Style Quiz</h3>
<h3 class="s-quz-b-txt2">Tell us a bit about yourself</h3>
<h4 class="s-quz-b-txt3	">Your style is personal. We never share information.</h4>
</div>
<?php
echo 'test';
/*echo 'test';
$product_terms = get_the_terms(1939, 'pa_pattern');
print_r($product_terms);
*/
/*global $wpdb;
$query= "select * from wp_terms";

$result = new WP_Query($query);
print_r($result);
echo '-----------------';
$params = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'post_status' => 'publish'
);
$wc_query = new WP_Query($params);

print_r($wc_query);

die();*/



//do_action( 'woocommerce_product_finder' );
//do_action( 'woocommerce_product_finder' , array( 'use_category' => false , 'search_attributes' => array( 'genre' , 'size' , 'colour' ) ) );

//echo 'testing<br>';
//'posts_per_page' => -1,  //show all posts
/*$args = array(
					'post_type' => 'product',
					'post_status' => 'publish',
    						array(
    								'tax_query' => array(
        															array(
            															'taxonomy' => 'product_cat',
            															'field' => 'slug',
            															'terms' => array( 'CASUAL','CLASSY','EDGY'),
            															//'operator' => 'IN'
        																),
        																array(
            															'taxonomy' => 'product_cat',
            															'field' => 'slug',
            															'terms' => array( 'MEMBERSHIP'),
            															'operator' => 'NOT IN',
        																),
    															),
    
));*/
/*$args = array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => array( 'casual', 'classy','edgy', ),
		),
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'term_id',
			'terms'    => array( 21 ),
			'operator' => 'NOT IN',
		),
	),
);
$loop = new WP_Query($args);
     if($loop->have_posts()):
     
    $term = $wp_query->queried_object;
     while($loop->have_posts()) : $loop->the_post();
		echo 'Post ID: '. $post->ID . ' ';     
     	$category_terms = get_the_terms( $post->ID , 'product_cat' );
     	if($check_category !='membership'):
		echo 'Category Name: '. 	$check_category = $category_terms[0]->name . ' ';
        //Output what you want      
   	echo '<br>Product Name: <a href="'.get_permalink().'">'.get_the_title().'</a><br>';

     	endif;
      endwhile;

endif;

die();*/
/*
//$query = new WP_Query( array('post_type' => 'product', 'cat' => '18','45','46','-21' ) );
$query = new WP_Query( array('post_type' => 'product', 'category__in' => array( '18','45','46' ) ) );
print_r($query);
while ($query->have_posts()) {    
$query->the_post();    
$post_id = get_the_ID();    
echo $post_id; 
the_title();    
echo "";
}
wp_reset_query();

die();*/


/*
//working code
*/
/*$meta_query[] = array(
    'key' => 'category_name',
    'value' => 'casual',
    'compare' => 'LIKE'
);
$meta_query[] = array(
    'key' => 'category_name',
    'value' => 'classy',
    'compare' => 'LIKE'
);
$meta_query[] = array(
    'key' => 'category_name',
    'value' => 'edgy',
    'compare' => 'LIKE'
);

/*$meta_query[] = array(
    'key' => 'staff_email',
    'value' => $search_string,
    'compare' => 'LIKE'
);*/

// The Query
/*$args['post_type'] = "product";
$args['meta_query'] = $meta_query;

$query = new WP_Query($args);
print_r($query);
die();*/


/*$args = array(
	'post_type'	=> 'product',
	'meta_query'	=> array(
									array( 'key' => 'category_name', 'value' => 'Casual', 'compare' => 'LIKE' ),
									array( 'key' => 'category_name', 'value' => 'Classy', 'compare' => 'LIKE' ),
									array( 'key' => 'pattern_name', 'value' => 'Animal', 'compare' => 'LIKE' ),
									array( 'key' => 'pattern_name', 'value' => 'Geomatric', 'compare' => 'LIKE' ),
									array( 'key' => 'color_name', 'value' => 'Blue', 'compare' => 'LIKE' ),
									array( 'key' => 'color_name', 'value' => 'Green', 'compare' => 'LIKE' ),
							'relation' => 'AND'
	)
);*/

/*$args = array(
	'post_type'	=> 'product',
	//'post_status' = > 'publish',
	//'posts_per_page' => '-1',
	'meta_query'	=> array(
									array( 'meta_key' => 'category_name', 'meta_value' => 'Casual', 'meta_compare' => 'LIKE' ),
									array( 'meta_key' => 'pattern_name', 'meta_value' => 'Animal', 'meta_compare' => 'LIKE' ),
									array( 'meta_key' => 'color_name', 'meta_value' => 'Blue', 'meta_compare' => 'LIKE' ),
									'relation' => 'AND'
	)
);*/


/*$args = array(
	'post_type'	=> 'product',
	'meta_query'	=> array(
									array( 'meta_key' => 'category_name', 'meta_value' => 'Classy', 'meta_compare' => 'LIKE' ),	//'compare' => 'IN',
									array( 'meta_key' => 'pattern_name', 'meta_value' => 'Geomatric', 'meta_compare' => 'LIKE' ),
									array( 'meta_key' => 'color_name', 'meta_value' => 'Yellow', 'meta_compare' => 'LIKE' ),
									array('taxonomy' => 'produt_cat','field' => 'id','terms' => 'membership',     'operator' => 'NOT IN'),
									'relation' => 'AND'
	)
);

//$the_query = new WP_Meta_Query( $args );
//$the_query = new WP_Query( $args );
//$query = new WP_Query( array('post_type' => 'product','posts_per_page'=>'-1', 'cat' => '18,45,46' ) );
//$query = new WP_Query( array( 'post_type'=>'product','category__and' => array( 18, 45 ,46 ) ) );
//print_r($the_query);
$categoryids = array(18,45,46);

$args = array( 
       'post_type' => 'product', 
       'tax_query'=> array(
            'taxonomy' => 'casual',
            'terms' => array('blue'),
            'field' => 'slug',
        )
);
$loop = new WP_Query( $args );
print_r($loop);
die();*/





?>
<!--form action="" method="POST"-->
								<div class="st-qz-eml-area">
									<!--input placeholder="Email" type="text" name="email" id="emailid">
									<button class="area-eml btnjoin">Join</button-->
									<?php echo do_shortcode( '[email-subscribers namefield="YES" desc="" group="Public"]' ); ?>
									
								</div>
								<div class="subscribermsg" style="display:none;margin-bottom:50px"><font color="red">Thanks to Subscribe...</font></div>
								<!--/form-->
								
<div class="container-fluid">
								<div class="prevnext-content">
								<div class="nxt-pr-are">
									<p class="text-center per-load">20%</p>
									<ul class="nxt-lvl">
										<li class="lvl-p-pre">
											<button type="button" class="btn btn-default prev-step"><i class="fa fa-angle-left" aria-hidden="true"></i>previous</button>
										</li>
										<li class="lvl-p-nxt">
										<button type="button" class="btn btn-primary next-step btnnext">next<i class="fa fa-angle-right" aria-hidden="true"></i></button>											
											</li>
										<ul class="progress-bar">
											<li class="pro-fill"></li>
											<li></li>
											<li></li>
											<li></li>
											<li></li>
										</ul>
									</ul>
								</div>
</div>		
							
</div>
</div>

<div class="category-content" align="center" style="display:none; margin-bottom:200px;">
<span id="response_here"></span>
<div class="s-quiz-bnr">
							<h3 class="s-quz-b-txt"> Style Quiz</h3>
							<h3 class="s-quz-b-txt2">How do you best describe yourself.</h3>
						</div>
<ul>
<?php
$category = get_categories('taxonomy=product_cat&type=product');
//print_r($category);

foreach($category as $cat)
{
$category_id = $cat->term_id;
//if(ucfirst($cat->cat_name) != 'Membership') {			// filter category by name
if($category_id != 21) {										// filter category by id
$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );
echo '<li class="text-center">';
//<span id="' . $thumbnail_id  .'">';
echo '<div class="cta-iimg"><img class="categoryimage" name="'. $cat->cat_name .'" src="' . $image . '" width="250" height="300" id="'. $thumbnail_id .'" /></div>';
echo '<p class="categoryname cta-nmz">' . ucfirst($cat->cat_name) . '</p>';
//echo '<input type="checkbox" name="category" value="' . $cat->cat_name .'">' . $cat->cat_name;
echo '<p class="cat_description drs-discrp">' . $cat->description . '</p>';
//echo '</span>';
echo '</li>'; 
}
}

?>


 </ul>
 
 
 
 <br><br>
 <div class="container-fluid">
 <div class="prevnext-content">
								<div class="nxt-pr-are">
									<p class="text-center per-load">40%</p>
									<ul class="nxt-lvl">
										<li class="lvl-p-pre">
											<button type="button" class="btn btn-default prev-step btncategoryprev"><i class="fa fa-angle-left" aria-hidden="true"></i>previous</button>
										</li>
										<li class="lvl-p-nxt">
										<button type="button" class="btn btn-primary next-step btncategory">next<i class="fa fa-angle-right" aria-hidden="true"></i></button>											
											</li>
										<ul class="progress-bar">
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li></li>
											<li></li>
											<li></li>
										</ul>
									</ul>
								</div>
</div>
 </div>
</div>



<!-- Color -->
<div class="color-content" align="center" style="display:none; margin-bottom:200px;">
<div class="s-quiz-bnr">
							<h3 class="s-quz-b-txt"> Style Quiz</h3>
							<h3 class="s-quz-b-txt2">Choose all color you like best.</h3>
						</div>
<div class="">
<?php
$color_terms = get_terms(['taxonomy' => 'pa_color','type'=>'product','hide_empty' => false]);


 if ( !empty( $color_terms ) && !is_wp_error( $color_terms ) ){
     echo "<ul>";
     foreach ( $color_terms as $cterm ) {
     	
     	$color_id = $cterm->term_id;
     	$color_name = $cterm->name;
     	$term_taxonomy_id = $cterm->term_taxonomy_id;
     	$taxonomy = $cterm->taxonomy;
     	
     	$a1 = get_term_meta($color_id);
     	//print_r($a1);
		$color_code = $a1['color'][0];
     	
       echo '<svg height="100" width="100">';
  		echo '<circle cx="50" cy="50" r="40" stroke="'.$term_taxonomy_id.'" name="'. $color_name .'" stroke-width="3" fill=" '. $color_code .'" />Sorry, your browser does not support inline SVG.</svg>';
       //echo '<img width="200" height="200" src="' . $image . '" class="' . $thumbnail_id .'" alt="pattern" title=""/>';


     }
     echo "</ul>";
 }
?>
</div>

<div class="container-fluid">
<div class="prevnext-content">
								<div class="nxt-pr-are">
									<p class="text-center per-load">60%</p>
									<ul class="nxt-lvl">
										<li class="lvl-p-pre">
											<button type="button" class="btn btn-default prev-step btnprintprev"><i class="fa fa-angle-left" aria-hidden="true"></i>previous</button>
										</li>
										<li class="lvl-p-nxt">
										<button type="button" class="btn btn-primary next-step btnprint">next<i class="fa fa-angle-right" aria-hidden="true"></i></button>											
											</li>
										<ul class="progress-bar">
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li></li>
											<li></li>
										</ul>
									</ul>
								</div>
</div>
</div>

 </div>

 <!-- Color end -->
 
 
 
 <!-- print -->
 <div class="print-content" align="center" style="display:none;margin-bottom:200px;">
<div class="s-quiz-bnr">
							<h3 class="s-quz-b-txt"> Style Quiz</h3>
							<h3 class="s-quz-b-txt2">Choose all the patterns you like best.</h3>
						</div> 
 
	<div class="printdiv">
<?php

$termsn = get_terms('pa_pattern', array('hide_empty' => 0, 'parent' =>0));

 if ( !empty( $termsn ) && !is_wp_error( $termsn ) ){
     echo "<ul>";
     foreach ( $termsn as $term ) {
     	
     	$term_id = $term->term_id;
     	//$term_name = $term->name;
     	$a1 = get_term_meta($term_id);
     	$meta_id = $a1['image'][0];
     	$name = strtolower($term->name);
		echo $img =  '<span class="printpattern" name= "' . $name .'"  id="'. $meta_id  .'">';
		echo wp_get_attachment_image($meta_id);
		echo " <li> " . $term->name . "  </li>";		
		echo '</span>';     	     	
     	
     	//echo wp_get_attachment_image($term->term_id);
     	//$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
     	//echo $thumbnail_id = get_woocommerce_term_meta( $term->term_id, $this->meta_key() . '_photo',, true );
     	//$this->thumbnail_id = get_woocommerce_term_meta( $this->term_id, $this->meta_key() . '_photo', true );
     	//echo $imgsrc = wp_get_attachment_image_src( $thumbnail_id, $this->size );
     	//echo $imgsrc = wp_get_attachment_image_src( $thumbnail_id, $this->size);
		//echo $image wp_get_attachment_url( $thumbnail_id );
		
      //echo '<img width="200" height="200" src="' . $image . '" class="printpattern" alt="" title=""/>';
       //echo '<img width="200" height="200" src="http://52.53.183.188/wp-content/uploads/2017/07/ss6-150x150.jpg" class="printpattern" alt="" title=""/>';


     }
     echo "</ul>";
 }




?>	 
	</div>          
 <div class="container-fluid">         
<div class="prevnext-content">
								<div class="nxt-pr-are">
									<p class="text-center per-load">80%</p>
									<ul class="nxt-lvl">
										<li class="lvl-p-pre">
											<button type="button" class="btn btn-default prev-step btnproductprev"><i class="fa fa-angle-left" aria-hidden="true"></i>previous</button>
										</li>
										<li class="lvl-p-nxt">
										<button type="button" class="btn btn-primary next-step btnproduct">next<i class="fa fa-angle-right" aria-hidden="true"></i></button>											
											</li>
										<ul class="progress-bar">
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li></li>
										</ul>
									</ul>
								</div>
</div>
</div>

 </div>
 <!-- print end -->
 
  
  <!-- Show product now -->
  
<div class="product-content" align="center" style="display:none;">

<div class="s-quiz-bnr">
							<h3 class="s-quz-b-txt"> Style Quiz</h3>
							<h3 class="s-quz-b-txt2">Select all the purse styles you like best.</h3>
						</div>

<span id="show_product_here" style="margin-bottom:50px;">
<?php 

echo '<img src="'. get_template_directory_uri() . '/images/Preloader_1.gif'.'" width="50" height="50" style="margin-top:200px; margin-bottom:200px;" align="center"/>';

?>
<!--img src="52.53.183.188/wp-content/themes/thepurseclub/images/Preloader_1.gif" width="40" height="40" style="margin-top:250px;"/-->
</span>

<div class="container-fluid">
								<div class="prevnext-content">
								<div class="nxt-pr-are">
									<p class="text-center per-load">100%</p>
									<ul class="nxt-lvl">
										<li class="lvl-p-pre">
											<button type="button" class="btn btn-default prev-step productprevious"><i class="fa fa-angle-left" aria-hidden="true"></i>previous</button>
										</li>
										<li class="lvl-p-nxt">
										<button type="button" class="btn btn-primary next-step productnext">next<i class="fa fa-angle-right" aria-hidden="true"></i></button>											
											</li>
										<ul class="progress-bar">
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
											<li class="pro-fill"></li>
										</ul>
									</ul>
								</div>
</div>		
							
</div>
</div>  
  
  
  <!-- Show product now -->
							

</body>
</html>
<?php

get_footer('new');

?><script>
jQuery(" #content").closest(".container").removeClass("container");
</script>