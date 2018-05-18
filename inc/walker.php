<?php

/** 
*   Collection of Walker Classes 
*   Abstract Method - navigates to different html markups
*/

/**
 * equivalent of wp_nav_menu()
 *  - <div class="menu-container">
 *  -   <ul> - start level of walker class [ start_lvl() ]. manages the opening tags
 *  -       <li>
 *  -           <a>Link</a> - start element [ start_el() ]
 *  -           <a><span></span></a> - end element [ end_el() ] upto the ending of li
 *  -       </li>
 *  -       <li><a>Link</a></li>
 *  -       <li><a>Link</a></li>
 *  -   </ul>
 *  - </div>
 */

 if( ! class_exists('Walker_Nav_Primary')):
    class Walker_Nav_Primary extends Walker_Nav_Menu {

        /**
         * handles the start of ul classes
         * ampersand before output - maintain all the information 
         * in the output variable
         */
        function start_lvl( &$output, $depth = 0, $args = []){

            /**
             * indents the output of wordpress
             */
            $indent = str_repeat("\t", $depth);
            $submenu = ( $depth > 0 ) ? ' sub-menu' : '';
            $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
        }

        /**
         * handles the start of li a span classes
         * item - all the item/element/attribute inside the element(li)
         * args - array information about the item [ before and after ]
         * id - predefined id of the element
         */
        function start_el( &$output, $item, $depth = 0, $args = [], $id = 0){
            $indent = ($depth) ? str_repeat("\t", $depth) : "";

            $li_attributes = '';
            $class_names = $value = '';

            /**
             * check if the classes inside the item is empty
             * returns the classes the item as array
             */
            $classes = empty($item->classes) ?  [] : (array) $item->classes;

            /**
             * bootstrap dropdown class
             */
            $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
            $classes[] = ( $item->current || $item->current_item_ancestor) ? 'active' : '';
            $classes[] = 'menu-item-' . $item->ID;
            if( $depth && $args->walker->has_children ) {
                $classes[] = 'dropdown-submenu';
            }

            /**
             * joins the array
             * similar to implode
             * apply filter
             * nav_menu_css_class - unify the class specified
             */
            $class_names = join( ' ', apply_filters('nav_menu_css_class', array_filter( $classes), $item, $args) );
            $class_names = ' class="' . esc_attr($class_names) . '"';

            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = strlen( $id ) ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

            $attributes = ! empty ( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= ! empty ( $item->attr_target ) ? ' target="' . esc_attr($item->attr_target) . '"' : '';
            $attributes .= ! empty ( $item->attr_xfn ) ? ' rel="' . esc_attr($item->attr_xfn) . '"' : '';
            $attributes .= ! empty ( $item->attr_url ) ? ' href="' . esc_attr($item->attr_url) . '"' : '';

            $attributes .= ! empty ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

            /**
             * html generated output before the argument 
             */
            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters( 'the_title' . $item->title, $item->ID) . $args->link_after;

            /**
             * parent element
             */
            $item_output .= ( $depth == 0  && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        /**
         * handles the end of li a span classes
         */
        // function end_el(){

        // }
        /**
         * handles the end of ul classes
         */
        // function end_lvl(){

        // }
    }
endif;