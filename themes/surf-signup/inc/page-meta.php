<?php
add_action( 'cmb2_admin_init', function(){

  $prefix = '_surfsignup_';

  $meta_box = new_cmb2_box( array(
    'id' => $prefix . 'tout_meta',
    'title' => __( 'Tout text', 'surf-signup' ),
    'object_types' => array( 'page' ), 
  //  'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/contact-page.php' ),
    'context' => 'normal',
    'priority' => 'default',
    'show_names' => true
  ));

  $meta_box->add_field( array(
    'name' => __( 'Tout text 1', 'surf-signup' ),
    'id'   => $prefix . 'tout1',
    'type' => 'text',
  ) );

  $meta_box->add_field( array(
    'name' => __( 'Tout text 2', 'surf-signup' ),
    'id'   => $prefix . 'tout2',
    'type' => 'text',
  ) );
} );
