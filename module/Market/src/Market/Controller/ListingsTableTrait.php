<?php

namespace Market\Controller;

/**
 * Description of ListingsTableTrait
 *
 * @author ennio
 */
trait ListingsTableTrait {

    private $listingsTable;

    function setListingsTable($listingsTable) {
        $this->listingsTable = $listingsTable;
    }

}
