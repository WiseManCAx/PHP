<?php
/*
 * =============================
 *   Array Paging              |
 * -----------------------------
 * -----------------------------
 *  Example
 * -----------------------------
 * =============================
 */

/*
 * 	Templates Config :
 * --------------------------------------------------------------------------
 * 	<ul>							:: Full Tag 
 * 		<li>						:: Num Tag || Disabled Tag || Active Tag
 * 			<a href="">Links</a>
 * 		</li>						:: Num Tag Close
 * 	</ul>							:: Full Tag Close
 */


/* Include library */
require_once 'ArrayPaging.php';


/* Data for paging */
$data = array(
    0 => array(
        'name' => 'A',
        'address' => 'Address_A',
    ),
    1 => array(
        'name' => 'B',
        'address' => 'Address_B',
    ),
    2 => array(
        'name' => 'C',
        'address' => 'Address_C',
    ),
    3 => array(
        'name' => 'D',
        'address' => 'Address_D',
    ),
);


/*
 * ===============================================
 * 	Examples 1
 * ===============================================
 */
/* Simple Paging */
$paging = new Paging($data, array('limit' => 2));
$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$paging->setPage($page);

echo '<pre>';
var_dump($paging->getData());
echo $paging->getLinks();


/*
 * ===============================================
 * 	Examples 2
 * ===============================================
 */
/* Paging With Own Template */
$options = array(
    'full_tag' => '<div class="paging">',
    'num_tag' => '<span>',
    'active_tag' => '<span class="active">',
    'disabled_tag' => '<span class="disabled">',
    'limit' => 2,
);
$paging2 = new Paging($data, $options);
$page2 = (isset($_GET['page']) ? $_GET['page'] : 1);
$paging2->setPage($page2);

echo '<pre>';
var_dump($paging2->getData());
echo $paging2->getLinks();
