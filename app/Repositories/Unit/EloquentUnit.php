<?php
/**
 * Created by PhpStorm.
 * User: Mahesh Bohara <maheshbohara0101@gmail.com>
 * Date: 10/6/2017
 * Time: 1:46 PM
 */

namespace App\Repositories\Unit;

use App\Helpers\Image\LocalImageFile;
use App\Media;
use App\Unit;

class EloquentUnit implements UnitRepository {
	/**
	 * @var Unit
	 */
	private $model;

	public function __construct( Unit $model ) {
		$this->model = $model;
	}

	public function getAll() {
		return $this->model->all();
	}

	public function getById( $id ) {
		return $this->model->findOrFail( $id );
	}

	/**
	 * @param array $attributes
	 *
	 * @return mixed
	 */
	public function create( array $attributes ) {
		$attributes['user_id'] = auth()->id();
		$post = $this->model->create( $attributes );
		return $post;
	}

	public function update( $id, array $attributes ) {
		$post = $this->getById( $id );
		$post->update( $attributes );
		return $post;
	}

	public function delete( $id ) {
		$post = $this->getById( $id );


		$post->delete();

		return true;
	}
}
