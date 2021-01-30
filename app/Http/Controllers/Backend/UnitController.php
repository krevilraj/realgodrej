<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UnitRequest;
use App\Repositories\Unit\UnitRepository;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller {
	/**
	 * @var UnitRepository
	 */
	private $unit;

	public function __construct( UnitRepository $unit ) {
		$this->unit = $unit;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$unitMembersCount = $this->unit->getAll()->count();

		return view( 'backend.unit.index', compact( 'unitMembersCount' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'backend.unit.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param UnitRequest|Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws Exception
	 */
	public function store( UnitRequest $request ) {
		try {

			$this->unit->create( $request->all() );

		} catch ( Exception $e ) {

			throw new Exception( 'Error in saving unit meamber: ' . $e->getMessage() );
		}

		return redirect()->back()->with( 'success', 'Unit  successfully added!' );
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
		$unit = $this->unit->getById( $id );

		return view( 'backend.unit.edit', compact( 'unit' ) );
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

			$this->unit->update( $id, $request->all() );

		} catch ( Exception $e ) {

			throw new Exception( 'Error in updating unit : ' . $e->getMessage() );
		}

		return redirect()->back()->with( 'success', 'Unit  successfully updated!' );
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

			$this->unit->delete( $id );

		} catch ( Exception $e ) {

			throw new Exception( 'Error in deleting unit : ' . $e->getMessage() );
		}

		return redirect()->back()->with( 'success', 'Unit  successfully deleted!' );
	}

	public function getUnitsJson( Request $request ) {
		$units = $this->unit->getAll();

		return datatables( $units )->toJson();
	}
}
