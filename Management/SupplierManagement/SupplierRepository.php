<?php

//require_once('F:\OSPanel\domains\projekt\Management\SupplierManagement/SupplierMapper.php');

require_once('SupplierMapper.php');

class SupplierRepository
{
    /**
     * @var SupplierMapper
     */
    private $_mapper;

    public function __construct(SupplierMapper $mapper)
    {
        $this->_mapper = $mapper;
    }

    /**
     * get all Suppliers from DB
     */
    public function getAllSuppliers():array
    {
        $suppliers = $this->_mapper->getAllSuppliers();

        return $suppliers;
    }

    /**
     * @param $supplierId
     * @return Supplier
     */
    public function getSupplierById($supplierId):Supplier
    {
        $supplier = $this->_mapper->getSupplierById($supplierId);

        return $supplier;

    }

    /**
     * @param $supplierId
     */
    public function storeCurrentlySupplier($supplierId)
    {
         $this->_mapper->storeCurrentlySupplier($supplierId);


    }
}