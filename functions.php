<form method="get" id="productS">
<input type="text" name="searchtxt" class="" />
<button type="search"><i class="icon-search searcBtn"></i></button>
</form>
<?php 
/*Search*/
  if(isset($_GET['searchtxt']))
  {
    global $wpdb;
    $result = $wpdb->get_results("SELECT * FROM `wp_posts` WHERE `post_title` like '%".$_GET['searchtxt']
    ."%' and post_type = 'product'");
    foreach ($result as $product) {
      $_product = wc_get_product( $product->ID );
      $attachment_ids[0] = get_post_thumbnail_id($product->ID);
      $attachment = wp_get_attachment_image_src($attachment_ids[0], 'thumbnail' );
      ?>
      <ul>
      <li><img src="<?php echo $attachment[0] ?>" /></li>
      <li><?php echo $product->post_title ?></li>  
      </ul>
      <?php
    }
  } 
/*Search*/
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".searcBtn").click(function(event) {
      $("#productS").submit();
    });
  });
</script>
