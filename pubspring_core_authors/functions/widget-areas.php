<?php 
// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-global',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}
// create widget areas: sidebar, footer
$sidebars = array('Blog Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-blog',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}

// create widget areas: sidebar, footer
$sidebars = array('Front-page Widgets');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'frontpage-widget',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	));
}