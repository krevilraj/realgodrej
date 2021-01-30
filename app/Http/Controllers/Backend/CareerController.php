<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CareerRequest;
use App\Repositories\Career\CareerRepository;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller {
	/**
	 * @var CareerRepository
	 */
	private $career;

	public function __construct( CareerRepository $career ) {
		$this->career = $career;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$careerMembersCount = $this->career->getAll()->count();

		return view( 'backend.career.index', compact( 'careerMembersCount' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'backend.career.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CareerRequest|Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws Exception
	 */
	public function store( CareerRequest $request ) {
		try {

			$this->career->create( $request->all() );

		} catch ( Exception $e ) {

			throw new Exception( 'Error in saving career meamber: ' . $e->getMessage() );
		}

		return redirect()->back()->with( 'success', 'Career  successfully added!' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$career = $this->career->getById( $id );

		return view( 'backend.career.edit', compact( 'career' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 * @throws Exception
	 */
	public function update( Request $request, $id ) {
		try {

			$this->career->update( $id, $request->all() );

		} catch ( Exception $e ) {

			throw new Exception( 'Error in updating career : ' . $e->getMessage() );
		}

		return redirect()->back()->with( 'success', 'Career  successfully updated!' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 * @throws Exception
	 */
	public function destroy( $id ) {
		try {

			$this->career->delete( $id );

		} catch ( Exception $e ) {

			throw new Exception( 'Error in deleting career : ' . $e->getMessage() );
		}

		return redirect()->back()->with( 'success', 'Career  successfully deleted!' );
	}

	public function getCareerJson( Request $request ) {
		$careers = $this->career->getAll();

		foreach ( $careers as $career ) {
			$career->author         = $career->user->full_name;
		}

		return datatables( $careers )->toJson();
	}
}
