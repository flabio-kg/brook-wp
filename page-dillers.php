<?php
/* Template Name: Шаблон страницы диллеров */

get_header(); ?>
    <style>
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        .sr-only-focusable:active, .sr-only-focusable:focus {
            position: static;
            width: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            clip: auto;
        }


        .moscow__blockwraps {
            background-color: white;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
            min-height: 150px;
            margin-bottom: 15px;
        }

        .moscow__blockwraps--logo {
            border-right: 1px solid #d7d7d7;
            display: inline-block;
            height: 130px;
            width: 250px;
            /* padding: 20px 30px; */
            text-align: center;
            padding-top: 20px;
        }

        .moscow__blockwraps--logo img {
            max-height: 90px;
            max-width: 180px;
        }

        .moscow__blockwraps--contacts {
            padding-left: 40px;
            display: inline-block;
            height: 150px;
            vertical-align: top;
            width: 340px;
        }

        .moscow__blockwraps--contacts__brand {
            margin: 0;
            font-size: 22px;
            color: #000;
            font-weight: 700;
            text-transform: uppercase;
            padding-bottom: 15px;
            line-height: 55px;
        }

        .moscow__blockwraps--contacts p {
            margin: 0;
            font-size: 21px;
            color: #000;
            font-weight: 400;
            padding-left: 35px;
            position: relative;
            line-height: 1.4;
        }

        .moscow__blockwraps--contacts p i {
            padding-right: 15px;
            font-size: 24px;
            color: #000;
            font-weight: 400;
            position: absolute;
            left: 0;
            -webkit-transform: translateY(10%);
            transform: translateY(10%);
        }

        .moscow__blockwraps--adress {
            display: inline-block;
            border-left: 1px solid #d7d7d7;
            height: 150px;
            vertical-align: top;
            width: 260px;
            padding-left: 55px;
        }

        .moscow__blockwraps--adress ul {
            margin: 0;
            padding: 10px 0 0;
        }

        .moscow__blockwraps--adress ul li {
            list-style-type: none;
            display: block;
            margin: 0;
            position: relative;
            padding-bottom: 20px;
            line-height: 35px;
        }

        .moscow__blockwraps--adress ul li:last-child {
            padding-bottom: 0;
        }

        .moscow__blockwraps--adress ul li i {
            margin-top: 5px;
            left: -10%;
            -webkit-transform: translateX(-10%);
            transform: translateX(-10%);
            font-size: 24px;
            color: #000;
            position: absolute;
        }

        .moscow__blockwraps--adress ul li a {
            padding-left: 15px;
            font-size: 18px;
            color: #000;
            font-weight: 400;
            text-decoration: none;
            transition: all 0.3s;
        }

        .moscow__blockwraps--adress ul li a:hover {
            color: #cacaca;
        }

        .moscow__blockwraps--adress .moscow__blockwraps--adress__double {
            line-height: 25px;
            padding: 0;
        }

        .moscow .lastblock {
            padding-top: 0;
        }

        .moscow .lastcontacts .fa-phone {
            position: absolute;
            left: 2%;
            -webkit-transform: translateX(-2%);
            transform: translateX(-2%);
        }

        .moscow .lastbrand {
            display: block;
        }

        .moscow .lastphone {
            padding-left: 40px;
            position: relative;
        }

        .caption {
            padding: 0 0 40px;
            text-align: center;
        }

        @media (max-width: 767px) {
            .caption {
                padding: 0 0 20px;
            }
        }

        .caption .caption__title {
            font-size: 35px;
            font-weight: 400;
            color: #000;
            margin: 0;
            font-weight: 700;
        }

        @media (max-width: 767px) {
            .caption .caption__title {
                font-size: 30px;
            }
        }

        #container {
            width: 960px;
            margin: 28px auto 50px;
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <div id="wrapper">
        <h1 style="font:30px GoudyOldSty-Reg,Georgia;"><?php echo $post->post_title;?></h1>
        <div style="border-top: solid 1px silver; padding:20px;">
            <div style="clear: left;"></div>
        </div>
    </div>
    <div class="moscow">
        <div class="container">

            <?php if (get_post_meta($post->ID,'city_1',1)) { ?>
                <div class="caption">
                    <h2 class="caption__title"><?php echo get_post_meta($post->ID,'city_1',1); ?></h2>
                </div>
            <?php } ?>

            <?php
            query_posts('post_type=dillers_moscow&posts_per_page=-1');
            if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="moscow__blockwraps">
                    <div class="moscow__blockwraps--logo">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="moscow__blockwraps--contacts">
                        <h3 class="moscow__blockwraps--contacts__brand">«<?php the_title(); ?>»</h3>
                        <?php
                            if (get_post_meta($post->ID,'phone_1',1)) {
                        ?>
                            <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_1',1); ?></p>
                                <?php
                                if (get_post_meta($post->ID,'phone_2',1)) {
                                    ?>
                            <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_2',1); ?></p>
                                <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="moscow__blockwraps--adress">
                        <ul>
                        <?php if (get_post_meta($post->ID,'email_1',1) && get_post_meta($post->ID,'email_2',1)) { ?>
                            <li class="moscow__blockwraps--adress__double"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <li class="moscow__blockwraps--adress__double"><a href="mailto:<?php echo get_post_meta($post->ID,'email_2',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                        <?php } else { ?>
                            <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                        <?php } if (get_post_meta($post->ID,'web_1',1) && get_post_meta($post->ID,'web_2',1)) { ?>
                            <li class="moscow__blockwraps--adress__double"><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                            <li class="moscow__blockwraps--adress__double"><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_2',1); ?>"><?php echo get_post_meta($post->ID,'web_2',1); ?></a></li>
                        <?php } else { ?>
                            <li><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php endwhile; endif; wp_reset_query(); ?>


            <?php if (get_post_meta($post->ID,'city_2',1)) { ?>
                <br>
                <div class="caption">
                    <h2 class="caption__title"><?php echo get_post_meta($post->ID,'city_2',1); ?></h2>
                </div>
            <?php } ?>

            <?php
            query_posts('post_type=dillers_piter&posts_per_page=-1');
            if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="moscow__blockwraps">
                    <div class="moscow__blockwraps--logo">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="moscow__blockwraps--contacts">
                        <h3 class="moscow__blockwraps--contacts__brand">«<?php the_title(); ?>»</h3>
                        <?php
                        if (get_post_meta($post->ID,'phone_1',1)) {
                            ?>
                            <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_1',1); ?></p>
                            <?php
                            if (get_post_meta($post->ID,'phone_2',1)) {
                                ?>
                                <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_2',1); ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="moscow__blockwraps--adress">
                        <ul>
                            <?php if (get_post_meta($post->ID,'email_1',1) && get_post_meta($post->ID,'email_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a href="mailto:<?php echo get_post_meta($post->ID,'email_2',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } if (get_post_meta($post->ID,'web_1',1) && get_post_meta($post->ID,'web_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_2',1); ?>"><?php echo get_post_meta($post->ID,'web_2',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php endwhile; endif; wp_reset_query(); ?>

            <?php if (get_post_meta($post->ID,'city_3',1)) { ?>
                <br>
                <div class="caption">
                    <h2 class="caption__title"><?php echo get_post_meta($post->ID,'city_3',1); ?></h2>
                </div>
            <?php } ?>

            <?php
            query_posts('post_type=dillers_et&posts_per_page=-1');
            if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="moscow__blockwraps">
                    <div class="moscow__blockwraps--logo">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="moscow__blockwraps--contacts">
                        <h3 class="moscow__blockwraps--contacts__brand">«<?php the_title(); ?>»</h3>
                        <?php
                        if (get_post_meta($post->ID,'phone_1',1)) {
                            ?>
                            <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_1',1); ?></p>
                            <?php
                            if (get_post_meta($post->ID,'phone_2',1)) {
                                ?>
                                <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_2',1); ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="moscow__blockwraps--adress">
                        <ul>
                            <?php if (get_post_meta($post->ID,'email_1',1) && get_post_meta($post->ID,'email_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a href="mailto:<?php echo get_post_meta($post->ID,'email_2',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } if (get_post_meta($post->ID,'web_1',1) && get_post_meta($post->ID,'web_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_2',1); ?>"><?php echo get_post_meta($post->ID,'web_2',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php endwhile; endif; wp_reset_query(); ?>

            <?php if (get_post_meta($post->ID,'city_4',1)) { ?>
                <br>
                <div class="caption">
                    <h2 class="caption__title"><?php echo get_post_meta($post->ID,'city_4',1); ?></h2>
                </div>
            <?php } ?>

            <?php
            query_posts('post_type=dillers_kl&posts_per_page=-1');
            if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="moscow__blockwraps">
                    <div class="moscow__blockwraps--logo">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="moscow__blockwraps--contacts">
                        <h3 class="moscow__blockwraps--contacts__brand">«<?php the_title(); ?>»</h3>
                        <?php
                        if (get_post_meta($post->ID,'phone_1',1)) {
                            ?>
                            <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_1',1); ?></p>
                            <?php
                            if (get_post_meta($post->ID,'phone_2',1)) {
                                ?>
                                <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_2',1); ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="moscow__blockwraps--adress">
                        <ul>
                            <?php if (get_post_meta($post->ID,'email_1',1) && get_post_meta($post->ID,'email_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a href="mailto:<?php echo get_post_meta($post->ID,'email_2',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } if (get_post_meta($post->ID,'web_1',1) && get_post_meta($post->ID,'web_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_2',1); ?>"><?php echo get_post_meta($post->ID,'web_2',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php endwhile; endif; wp_reset_query(); ?>

            <?php if (get_post_meta($post->ID,'city_5',1)) { ?>
                <br>
                <div class="caption">
                    <h2 class="caption__title"><?php echo get_post_meta($post->ID,'city_5',1); ?></h2>
                </div>
            <?php } ?>

            <?php
            query_posts('post_type=dillers_sr&posts_per_page=-1');
            if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="moscow__blockwraps">
                    <div class="moscow__blockwraps--logo">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="moscow__blockwraps--contacts">
                        <h3 class="moscow__blockwraps--contacts__brand">«<?php the_title(); ?>»</h3>
                        <?php
                        if (get_post_meta($post->ID,'phone_1',1)) {
                            ?>
                            <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_1',1); ?></p>
                            <?php
                            if (get_post_meta($post->ID,'phone_2',1)) {
                                ?>
                                <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_2',1); ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="moscow__blockwraps--adress">
                        <ul>
                            <?php if (get_post_meta($post->ID,'email_1',1) && get_post_meta($post->ID,'email_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a href="mailto:<?php echo get_post_meta($post->ID,'email_2',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } if (get_post_meta($post->ID,'web_1',1) && get_post_meta($post->ID,'web_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_2',1); ?>"><?php echo get_post_meta($post->ID,'web_2',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php endwhile; endif; wp_reset_query(); ?>

            <?php if (get_post_meta($post->ID,'city_6',1)) { ?>
                <br>
                <div class="caption">
                    <h2 class="caption__title"><?php echo get_post_meta($post->ID,'city_6',1); ?></h2>
                </div>
            <?php } ?>

            <?php
            query_posts('post_type=dillers_n1&posts_per_page=-1');
            if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="moscow__blockwraps">
                    <div class="moscow__blockwraps--logo">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="moscow__blockwraps--contacts">
                        <h3 class="moscow__blockwraps--contacts__brand">«<?php the_title(); ?>»</h3>
                        <?php
                        if (get_post_meta($post->ID,'phone_1',1)) {
                            ?>
                            <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_1',1); ?></p>
                            <?php
                            if (get_post_meta($post->ID,'phone_2',1)) {
                                ?>
                                <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_2',1); ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="moscow__blockwraps--adress">
                        <ul>
                            <?php if (get_post_meta($post->ID,'email_1',1) && get_post_meta($post->ID,'email_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a href="mailto:<?php echo get_post_meta($post->ID,'email_2',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } if (get_post_meta($post->ID,'web_1',1) && get_post_meta($post->ID,'web_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_2',1); ?>"><?php echo get_post_meta($post->ID,'web_2',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php endwhile; endif; wp_reset_query(); ?>

            <?php if (get_post_meta($post->ID,'city_7',1)) { ?>
                <br>
                <div class="caption">
                    <h2 class="caption__title"><?php echo get_post_meta($post->ID,'city_7',1); ?></h2>
                </div>
            <?php } ?>

            <?php
            query_posts('post_type=dillers_n2&posts_per_page=-1');
            if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="moscow__blockwraps">
                    <div class="moscow__blockwraps--logo">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="moscow__blockwraps--contacts">
                        <h3 class="moscow__blockwraps--contacts__brand">«<?php the_title(); ?>»</h3>
                        <?php
                        if (get_post_meta($post->ID,'phone_1',1)) {
                            ?>
                            <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_1',1); ?></p>
                            <?php
                            if (get_post_meta($post->ID,'phone_2',1)) {
                                ?>
                                <p><i class="fa fa-phone"></i><?php echo get_post_meta($post->ID,'phone_2',1); ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="moscow__blockwraps--adress">
                        <ul>
                            <?php if (get_post_meta($post->ID,'email_1',1) && get_post_meta($post->ID,'email_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a href="mailto:<?php echo get_post_meta($post->ID,'email_2',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_post_meta($post->ID,'email_1',1); ?>"><?php echo get_post_meta($post->ID,'email_1',1); ?></a></li>
                            <?php } if (get_post_meta($post->ID,'web_1',1) && get_post_meta($post->ID,'web_2',1)) { ?>
                                <li class="moscow__blockwraps--adress__double"><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                                <li class="moscow__blockwraps--adress__double"><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_2',1); ?>"><?php echo get_post_meta($post->ID,'web_2',1); ?></a></li>
                            <?php } else { ?>
                                <li><i class="fa fa-globe"></i><a target="_blank" href="http://<?php echo get_post_meta($post->ID,'web_1',1); ?>"><?php echo get_post_meta($post->ID,'web_1',1); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php endwhile; endif; wp_reset_query(); ?>

            <br><br>


        </div>
    </div>
    <!-- end dautov-->

<?php get_footer(); ?>