<?php 

class Paginate {

    public $current_page;
    public $items_per_page;
    public $items_total_count;

    public function __construct($page=1, $items_per_page=4, $items_total_count=0){

        $this->current_page = (int)$page;
        $this->items_per_page = (int)$items_per_page;
        $this->items_total_count = (int)$items_total_count;

    }

    //Give us next page by adding 1
    public function next() {

        return $this->current_page + 1;

    }

    //Give us previous page by substracting 1
    public function previous() {

        return $this->current_page - 1;

    }

    //Since we know the total items we devide them by how many items per page  so we can have total pages rounded up
    public function page_total(){

        // eto yung galing sa index bibilangin yung laman ng nasa database then divide sa items_per_page
        return ceil($this->items_total_count/$this->items_per_page); // this will going to divide and round up the number

    }

    //Check to see if we have next page to show
    public function has_previous() {

        return $this->previous() >= 1 ? true : false;

    }

    //Check to see if we have next page to show
    public function has_next() {

        return $this->next() <= $this->page_total() ? true : false;

    }

    // Jump to another page after 10 post depents on the item
    public function offset() {

        return ($this->current_page -1) * $this->items_per_page; 

    }





}


?>