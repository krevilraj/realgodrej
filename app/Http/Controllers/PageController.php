<?php

namespace App\Http\Controllers;

use App\Media;
use App\Page;
use Doctrine\DBAL\Driver\AbstractDB2Driver;
use Illuminate\Http\Request;
use App\About;

class PageController extends Controller {
	protected $pageTemplate = 'pages.templates.';

	public function getPage( $slug = null ) {
		$page = Page::where( 'slug', $slug );
		$page = $page->firstOrFail();
        return view( $this->pageTemplate . $page->template )
			->with( [
				'page' => $page,
     			] );
	}
}
