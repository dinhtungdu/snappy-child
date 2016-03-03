<?php
/**
 * Template Name: Clone Category
 *
 * @package Clone2
 */

include 'class.Database.inc';

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article>

				<header class="entry-header">
					<h1>Clone Category</h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
				<?php
				require_once( ABSPATH . '/wp-admin/includes/taxonomy.php' );
				$db = Database::getInstance();
    			$mysqli = $db->getConnection();
				$sql = "SELECT catid, parentid, title, titlesite, alias, description FROM `vm_vi_news_cat` WHERE `parentid`>0 ORDER BY `parentid` ASC";
    			$result = $mysqli->query( $sql );
    			function id_routing($id = 0) {
    				if ($id === 0) {
    					return 0;
    				}
    				switch ($id) {
						case 1:
							return 2;
							break;
						case 2:
							return 3;
							break;
						case 4:
							return 4;
							break;
						case 3:
							return 5;
							break;
						case 5:
							return 6;
							break;
						case 7:
							return 7;
							break;
						case 8:
							return 8;
							break;
						case 18:
							return 9;
							break;
						case 9:
							return 10;
							break;
						case 10:
							return 11;
							break;
						case 27:
							return 12;
							break;
						case 24:
							return 13;
							break;
						case 25:
							return 14;
							break;
						case 14:
							return 15;
							break;
						case 6:
							return 16;
							break;
						case 22:
							return 17;
							break;
						case 23:
							return 18;
							break;
						case 26:
							return 19;
							break;
						case 11:
							return 20;
							break;
						case 12:
							return 21;
							break;
						case 13:
							return 22;
							break;
						case 19:
							return 23;
							break;
						case 20:
							return 24;
							break;
    					default:
    						# code...
    						break;
    				}
    			}
    			while( $row = $result->fetch_assoc() ) {
    				echo $row['catid'] . '-' . $row['parentid'] . '-' . $row['title'];
    				// if (! $exist) {
	    				$cat_array = array(
							'cat_name' => $row['title'],
							'category_description' => $row['description'],
							'category_nicename' => $row['alias'],
							'category_parent' => id_routing($row['parentid']),
							// 'category_parent' => $row['parentid'],
							'taxonomy' => 'category'
						);
						$newid = wp_insert_category($cat_array);
    				// }
    					if($newid) {
    						echo ' - ' .$newid; 
    					}
						echo '<br/>';
    			}
    			?>

				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>