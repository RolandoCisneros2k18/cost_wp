<?php

function cost_styles(){
  //registrar estilos
wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css', array(),'5.0.0');
wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array('normalize'),'4.0.0');
wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/css/font-awesome.min.css', array(''),'4.7.0');
wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', array(),'1.0.0');


//resgistrando version actualizada Jquery
wp_deregister_script('jquery');
wp_register_script('jquery', get_template_directory_uri().'/js/jquery-3.3.1.min.js', false, '');
wp_enqueue_script('jquery');
wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'4.0.0',true);

}
add_action('wp_enqueue_scripts', 'cost_styles');
//cargando menus
register_nav_menus( array(
  'menu_principal' => __('Menu Principal','cost'),
  'menu_social' => __('Menu Social','cost')
));
//widget

function cost_widgets (){
  register_sidebar(array(

  ) );
}
