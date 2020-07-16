<?php

namespace App;

class Paginator {

    private $page;
    private $perPage;
    private $totalCount;
    private $items;

    public function __construct(int $page, int $perPage, int $totalCount, array $items) {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->totalCount = $totalCount;
        $this->items = $items;
    }

    /**
     * Get the value of page
     */ 
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set the value of page
     *
     * @return  self
     */ 
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get the value of totalCount
     */ 
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * Set the value of totalCount
     *
     * @return  self
     */ 
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @return  self
     */ 
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get the value of perPage
     */ 
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * Set the value of perPage
     *
     * @return  self
     */ 
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        
        return $this;
    }

    public function getLastPage()
    {
        return ceil($this->totalCount / $this->perPage);
    }
}