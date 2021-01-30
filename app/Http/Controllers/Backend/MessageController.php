<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
        $messagecount = Message::all()->count();

		return view( 'backend.messages.index', compact( 'messagecount' ) );
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
        $message = Message::findorFail( $id );

        return view( 'backend.messages.edit', compact( 'message' ) );
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
$message = Message::findorFail($id);
			$message->delete( $id );

		} catch ( Exception $e ) {

			throw new Exception( 'Error in deleting message : ' . $e->getMessage() );
		}

		return redirect()->back()->with( 'success', 'Message  successfully deleted!' );
	}

	public function getMessagesJson( Request $request ) {
		$messages = Message::all();

		foreach ( $messages as $message ) {
			$message->message         = excerpt($message->message,15);
			$message->full_name = $message->first_name.' '.$message->last_name;
			$message->contact_info = $message->email.', '.$message->phone.', '.$message->address;
		}

		return datatables( $messages )->toJson();
	}
}
