<?php

namespace App;

use App\Helpers\Image\LocalImageFile;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	use Sluggable;

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable() {
		return [
			'slug' => [
				'source' => 'name'
			]
		];
	}

	/**
	 * @var array
	 */
	protected $fillable = [
		'name',
		'slug',
		'sku',
		'price',
		'short_description',
		'description',
		'is_featured',
		'status',
		'page_title',
		'page_description',
	];




	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function images() {
		return $this->hasMany( ProductImage::class );
	}

	public function categories() {
		return $this->belongsToMany( Category::class );
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function enquiries() {
		return $this->hasMany( ProductEnquiry::class );
	}


	/**
	 * Return default image or LocalImageFile Object
	 *
	 * @return LocalImageFile|mixed
	 */
	public function getImageAttribute() {
		$defaultPath = "/img/default-product.jpg";
		$image       = $this->images()->where( 'is_main_image', '=', 1 )->first();

		if ( null === $image ) {
			return new LocalImageFile( $defaultPath );
		}

		if ( $image->path instanceof LocalImageFile ) {
			return $image->path;
		}

	}

	public function getProductGallery() {
		$gallery = $this->images()->get();

		if ( null === $gallery ) {
			return null;
		}

		$galleryArray = [];

		foreach ( $gallery as $gal ) {
			$galleryArray[] = $gal->path;
		}

		return $galleryArray;
	}

	public function getRelatedProduct(){
        $categories = $this->categories()->get()->pluck('id')->toArray();
        $product_name = $this->attributes['name'];
        $relatedProducts = Product::whereHas('categories', function ($query) use ($categories) {
            $query->whereIn('categories.id', $categories);
        })->whereNotIn('name', [$product_name])->take(10)->get();
        return $relatedProducts;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }
}
