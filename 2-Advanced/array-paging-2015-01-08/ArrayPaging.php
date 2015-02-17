<?php
/*
 * 	@author : WiseMan CAx
 * 	@version : 1.0.0
 *
 * 	=============================================
 * 	Class Paging
 * 	=============================================
 * 	
 * 	This class can generate pagination links for listings in an array.
 * 	It takes a list of items to display in an array and generates links to browse the the previous and next pages that will list the items.
 * 	The current page number is retrieved from a request parameter. The limit number of items to display per page is configurable.
 */

class Paging {

    public $base_url;
    public $data;
    public $offset;
    public $limit;
    public $total_row;
    public $total_page;
    public $current_page = 1;
    private $result;

    /* Template */
    public $full_tag;
    public $full_tag_close;
    public $num_tag;
    public $num_tag_close;
    public $active_tag;
    public $active_tag_close;
    public $disabled_tag;
    public $disabled_tag_close;

    /*
     * 	@params $data
     * 	@params $params
     */

    public function __construct(Array $data, Array $params) {
        $this->base_url = (isset($_SERVER['HTTPS']) ? 'https:\\\\' : 'http:\\\\') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->limit = 10;
        $this->data = $data;

        if (count($params) > 0) {
            foreach ($params as $key => $val) {
                $this->$key = $val;

                if ($key == 'full_tag') {
                    $this->full_tag_close = $this->_generateCloseTag($val);
                } elseif ($key == 'num_tag') {
                    $this->num_tag_close = $this->_generateCloseTag($val);
                } elseif ($key == 'active_tag') {
                    $this->active_tag_close = $this->_generateCloseTag($val);
                } elseif ($key == 'disabled_tag') {
                    $this->disabled_tag_close = $this->_generateCloseTag($val);
                }
            }
        }

        $this->_checkDefaultTag();
    }

    /*
     * 	Generate data paging
     */

    public function getData() {
        $this->_countTotalRow();
        $this->_countPage();
        $this->_countOffset();

        $data = array_slice($this->data, $this->offset, $this->limit, TRUE);
        return $this->result = $data;
    }

    /*
     * 	
     */

    public function getLinks() {
        $this->base_url = (preg_match('/page=\d/', $this->base_url)) ? preg_replace('/[?|&]page=\d/', '', $this->base_url) : $this->base_url;
        $page_op = (strpos($this->base_url, '?') === FALSE) ? '?' : '&';

        $link = $this->full_tag;

        if ($this->current_page == 1) {
            $link .= $this->disabled_tag . '<a href="#">&laquo;</a>' . $this->disabled_tag_close;
        } else {
            $link .= $this->num_tag . '<a href="' . $this->base_url . $page_op . 'page=' . ($this->current_page - 1) . '">&laquo;</a>' . $this->num_tag_close;
        }

        for ($a = 1; $a <= $this->total_page; $a++) {
            $open = $this->num_tag;
            $close = $this->num_tag_close;
            if ($this->current_page == $a) {
                $open = $this->active_tag_close;
                $close = $this->active_tag_close;
            }
            $link .= $open . '<a href="' . $this->base_url . $page_op . 'page=' . $a . '">' . $a . '</a>' . $close;
        }

        if ($this->current_page == $this->total_page) {
            $link .= $this->disabled_tag . '<a href="#">&raquo;</a>' . $this->disabled_tag_close;
        } else {
            $link .= $this->num_tag . '<a href="' . $this->base_url . $page_op . 'page=' . ($this->current_page + 1) . '">&raquo;</a>' . $this->num_tag;
        }

        $link .= $this->full_tag_close;
        return $link;
    }

    /*
     * 	Set paging
     */

    public function setPage($page) {
        $this->current_page = $page;
    }

    protected function _countTotalRow() {
        $total_row = count($this->data);
        return $this->total_row = $total_row;
    }

    protected function _countPage() {
        $page = ceil($this->total_row / $this->limit);
        return $this->total_page = $page;
    }

    protected function _countOffset() {
        $offset = ($this->current_page - 1) * $this->limit;
        return $this->offset = $offset;
    }

    protected function _generateCloseTag($tag) {
        $closed_tag = substr($tag, 1, (strlen($tag) - 2));
        $closed_tag = preg_replace('/ .*/', '', $closed_tag);
        return '</' . $closed_tag . '>';
    }

    protected function _checkDefaultTag() {
        if ($this->full_tag == '' OR $this->full_tag == null OR empty($this->full_tag)) {
            $this->full_tag = '<ul class="pagination">';
            $this->full_tag_close = '</ul>';
        }

        if ($this->num_tag == '' OR $this->num_tag == null OR empty($this->num_tag)) {
            $this->num_tag = '<li>';
            $this->num_tag_close = '</li>';
        }

        if ($this->active_tag == '' OR $this->active_tag == null OR empty($this->active_tag)) {
            $this->active_tag = '<li class="active">';
            $this->active_tag_close = '</li>';
        }

        if ($this->disabled_tag == '' OR $this->disabled_tag == null OR empty($this->disabled_tag)) {
            $this->disabled_tag = '<li class="disabled">';
            $this->disabled_tag_close = '</li>';
        }
    }

}
