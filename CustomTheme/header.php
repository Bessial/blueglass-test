<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script rel="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <?php do_action('additional_custom_stuff')?>
    <title>BlueGlass Test</title>
    <?php wp_head();?>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <script>  
        function openNav() {
            document.getElementById("mySidebar").style.width = "81%";
            document.getElementById("navOpen").style.marginLeft = "81%";
        }
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("navOpen").style.marginLeft= "0";
        }
    </script>
</head>

<body>
    <header class="header-wrapper">
        <div class="header logo">
            <a href="<?= get_home_url(); ?>"><img src="<?= wp_get_attachment_url(get_field('logo', 'option')); ?>"></a>
        </div>
        
        <div class="header menu">
            <?php wp_nav_menu( array(
                    'menu' => 'Header'
                    )
                );
            ?>
        </div>

        <div id="navOpen">
            <button class="openbtn" onclick="openNav()"><?= get_field('open_mobile_nav', 'option')?></button>  
            <div class="navmobile">
                <div id="mySidebar" class="sidebar">
                    <div class="sidebar-bg"></div>
                    <div class="navMenu">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><?= get_field('close_mobile_nav', 'option')?></a>
                        <?php wp_nav_menu( array(
                            'menu' => 'Header'
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
	</header>
  
