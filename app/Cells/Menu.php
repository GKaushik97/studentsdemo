<?php
/**
 * Menu cell
 */

namespace App\Cells;

class Menu 
{
    /**
     * Top menu
     */
    public function topMenu() : string
    {
        // $menu_model = model('MenuModel');
        return view('template/top_menu');
    }

    /**
     * Left menu
     */
    public function leftMenu() : string
    {
        return 'Left menu';
    }

    /**
     * Footer Menu
     */
    public function footerMenu() : string
    {
        return 'Footer Menu';
    }
}
