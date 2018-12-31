<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2018/12/30
 * Time: 14:08
 */


namespace App\Transformers;

abstract class Transformer
{
	/**
	 * @param $items
	 * @return array
	 */
	public function transformCollection($items)
	{
		return array_map([$this,'transform'],$items);
	}

	/**
	 * @param $item
	 * @return mixed
	 */
	public abstract function transform($item);

}
