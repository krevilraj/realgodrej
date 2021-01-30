<?php

namespace App\Repositories\Product;

use App\Product;
use App\ProductFaq;
use App\ProductSpecification;
use App\ProductDownload;
use App\ProductImage;

class EloquentProduct implements ProductRepository {

	/**
	 * @var Product
	 */
	private $model;

	public function __construct( Product $model ) {
		$this->model = $model;
	}

	public function getAll() {
		return $this->model->all();
	}



	public function getById( $id ) {
		return $this->model->find( $id );
	}

	public function create( array $attributes ) {

		$product = $this->model->create( $attributes );

		// Product categories
		if ( isset( $attributes['category'] ) ) {
			$product->categories()->attach( $attributes['category'] );
		}

		// Product Images
		if ( isset( $attributes['image'] ) && null !== $attributes['image'] ) {
			foreach ( $attributes['image'] as $key => $data ) {
				ProductImage::create( $data + [ 'product_id' => $product->id ] );
			}
		}

// Product Specifications
        if (isset($attributes['specifications'])) {
            $titles = $attributes['specifications']['title'];
            $descriptions = $attributes['specifications']['description'];

            $specificationsKeys = array_keys($titles);

            foreach ($specificationsKeys as $specification) {
                // Create specification
                $this->createSpecification([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'title' => $titles[$specification],
                    'description' => $descriptions[$specification],
                ]);
            }
        }


		return $product;
	}

	public function update( $id, array $attributes ) {
		$product = $this->model->findOrFail( $id );

		$attributes['is_featured']   = ! isset( $attributes['is_featured'] ) ? 0 : 1;

		$product->update( $attributes );


		// Product categories
			$product->categories()->sync( $attributes['category']??[] );

		// Product Images
		if ( isset( $attributes['image'] ) && null !== $attributes['image'] ) {
			$exitingIds = $product->images()->get()->pluck( 'id' )->toArray();
			foreach ( $attributes['image'] as $key => $data ) {
				if ( is_int( $key ) ) {
					if ( ( $findKey = array_search( $key, $exitingIds ) ) !== false ) {
						$productImage = ProductImage::findOrFail( $key );
						$productImage->update( $data );
						unset( $exitingIds[ $findKey ] );
					}
					continue;
				}
				ProductImage::create( $data + [ 'product_id' => $product->id ] );
			}
			if ( count( $exitingIds ) > 0 ) {
				ProductImage::destroy( $exitingIds );
			}

		}

        // Product Specifications
        if (isset($attributes['specifications'])) {
            $titles = $attributes['specifications']['title'];
            $descriptions = $attributes['specifications']['description'];

            $specificationKeys = array_keys($titles);

            foreach ($specificationKeys as $specification) {
                if ($this->specificationExists($specification)) {
                    // Update specification
                    $this->updateSpecification([
                        'id' => $specification,
                        'title' => $titles[$specification],
                        'description' => $descriptions[$specification],
                    ]);
                } else {
                    // Create specification
                    $this->createSpecification([
                        'user_id' => auth()->id(),
                        'product_id' => $id,
                        'title' => $titles[$specification],
                        'description' => $descriptions[$specification],
                    ]);
                }
            }
        }

		return $product;

	}
    /**
     * Check if Specification already exists
     *
     * @param $specification
     *
     * @return mixed
     */
    protected function specificationExists($specification)
    {
        return ProductSpecification::where('id', '=', $specification)->exists();
    }

    /**
     * Update Specification
     *
     * @param array $attributes
     */
    protected function createSpecification(array $attributes)
    {
        return ProductSpecification::create($attributes);
    }

    /**
     * Update Specification
     *
     * @param array $attributes
     *
     * @return bool
     */
    protected function updateSpecification(array $attributes)
    {
        $specification = ProductSpecification::findOrFail($attributes['id']);

        $specification->title = $attributes['title'];
        $specification->description = $attributes['description'];

        $specification->save();

        return $specification;
    }


	public function delete( $id ) {
		$product = $this->getById( $id );

		// Detach categories
		$product->categories()->detach();
// Delete specifications
        $product->specifications()->delete();


		$product->delete();

		return true;
	}
}
