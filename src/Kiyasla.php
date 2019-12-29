<?php

namespace MithatGuner\Kiyasla;

use MithatGuner\Kiyasla\Models\Kiyasla as KiyaslaModel;

class Kiyasla
{
	public $instance;

	public function __construct()
    {
    	$this->instance     =   $this->getKiyasla();   
    }

    protected function getKiyasla()
    {
    	$kiyaslaModel = new KiyaslaModel;
    	return $kiyaslaModel;
    }

    public function add($product_id,$user_id)
    {
    	$this->create($product_id,$user_id);
    }

    public function getUserKiyasla($user_id)
    {
    	return $this->instance->ofUser($user_id)->get();
    }

    public function remove($id)
    {
    	$this->instance->where('id', $id)->first()->delete();
    }

    public function removeUserKiyasla($user_id)
    {
    	$this->instance->ofUser($user_id)->delete();
    }

    public function removeByProduct($product_id,$user_id)
    {
        $this->getKiyaslaItem($product_id,$user_id)->delete();
    }

    protected function create($product_id,$user_id)
    {
    	$matchThese	=   ['product_id'   =>  $product_id,'user_id' => $user_id];

    	$kiyasla 	=	KiyaslaModel::updateOrcreate($matchThese, 
        				$matchThese);
    	return $kiyasla;
    }

    public function count($user_id)
    {
        return $this->instance->ofUser($user_id)->count();
    }

    public function getKiyaslaItem($product_id,$user_id)
    {
        return $this->instance->byProduct($product_id)
                              ->ofUser($user_id)->first();
    }

}