<?php

/**
 * Paginator
 * 
 * Pagination for pages and results
 */
class Paginator{

    /**
     * Limit
     *
     * @var [integer]
     */
    public $limit;

    /**
     * Offset
     *
     * @var [integer]
     */
    public $offset;

    /**
     * Previuos page pagination
     *
     * @var [integer]
     */
    public $previous;

    /**
     * Next page pagination
     *
     * @var [integer]
     */
    public $next;


    /**
     * Constructor
     *
     * @param [integer] $page page number
     * @param [integer] $records_per_page number of records per page
     * @param [integer] $total_records total records
     */
    public function __construct($page, $records_per_page, $total_records){

            $this->limit = $records_per_page;

            $page = filter_var($page, FILTER_VALIDATE_INT, [
                'options'=>[
                    'default'=>1,
                    'min_range'=>1
                ]
            ]);

            if($page > 1){
                $this->previous = $page - 1;
            }


            $total_pages = ceil($total_records / $records_per_page);
            if($page < $total_pages){
                $this->next = $page + 1;
            }

            $this->offset = $records_per_page * ($page - 1);
    }
}