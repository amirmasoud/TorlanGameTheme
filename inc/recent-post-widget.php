<?php
/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class torlangame_Widget_Recent_Posts extends WP_Widget {

    function __construct() {
        parent::__construct(
    
            'torlangame_Widget_Recent_Posts',
            __( 'آخرین نوشته بر اساس دسته', 'torlangame' ),
            array(
                'classname'   => 'torlangame_Widget_Recent_Posts widget_recent_entries',
                'description' => __( 'نمایش مطالب بر اساس یه دسته خاص.', 'torlangame' )
            )
    
        );

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title     = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        $category  = $instance['category'];
        $number    = $instance['number'];

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'cat' => $category, 'post_type' => 'post' ) ) );
        if ($r->have_posts()) :
?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . '<a href="' . get_category_link( $category ) . '">' . $title . '</a>' . $after_title; ?>
        <section>
            <div class="mini-posts">
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <!-- Mini Post -->
                    <article class="mini-post">
                        <header>
                            <h3><a href="<?php echo esc_url( get_permalink() ) ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h3>
                            <time class="published" datetime="<?php the_date( 'Y-m-d' ) ?>"><?php the_date( get_option('date_format') ) ?></time>
                            <a class="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 38.4 ); ?></a>
                        </header>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="image featured" rel="bookmark"><?php the_post_thumbnail( 'torlangame-article-thumb' ); ?></a>
                    </article>
            <?php endwhile; ?>
            </div>
        </section>
        <?php echo $after_widget; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance              = $old_instance;
        $instance['title']     = wp_strip_all_tags( $new_instance['title'] );
        $instance['category']  = wp_strip_all_tags( $new_instance['category'] );
        $instance['number']    = is_numeric( $new_instance['number'] ) ? intval( $new_instance['number'] ) : 5;
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        $defaults  = array( 'title' => '', 'category' => '', 'number' => 5 );
        $instance  = wp_parse_args( ( array ) $instance, $defaults );
        $title     = $instance['title'];
        $category  = $instance['category'];
        $number    = $instance['number'];

?>
        <p>
            <label for="rpc_title"><?php _e( 'عنوان' ); ?>:</label>
            <input type="text" class="widefat" id="rpc_title" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        
        <p>
            <label for="rpc_category"><?php _e( 'دسته' ); ?>:</label>              
            
            <?php

            wp_dropdown_categories( array(
                'hide_empty' => 0,
                'name'       => $this->get_field_name( 'category' ),
                'id'         => 'rpc_category',
                'class'      => 'widefat',
                'selected'   => $category
            ) );

            ?>
        </p>
        
        <p>
            <label for="rpc_number"><?php _e( 'تعداد مطالب برای نمایش' ); ?>: </label>
            <input type="text" id="rpc_number" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>

<?php
    }
}