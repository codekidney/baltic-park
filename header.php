<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php the_title();?></title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?> 
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap&subset=latin-ext" rel="stylesheet">

</head>
<body <?php body_class(); ?>>

    <header>
       <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo '<strong>'. get_bloginfo( 'name' ) .'</strong>';
                    }
                    ?>
                </div>
                <div class="col-sm-12 col-md-2">
                    <?php echo '<div class="slogan">'.get_theme_mod('theme_slogan_setting').'</div>'; ?>
                </div>
                <div class="col-sm-12 col-md-6">
                    <?php wp_nav_menu( array( 'theme_location' => 'Main menu', 'container_class' => 'menu__container' ) ); ?>
                </div>
                <div class="col-sm-12 col-md-2">
                    <?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'top-sidebar' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
    </header>