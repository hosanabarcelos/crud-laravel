<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
	//GET
	public function listing(Request $request)
	{
		$Phrase = Phrase::all();

		return response()->json($Phrase);
	}

	//POST
	public function create(Request $request)
	{
		$newPhrase = new Phrase();
		$newPhrase->category = $request->category;
		$newPhrase->phrase = $request->phrase;
		$newPhrase-> save();

		return response()->json('success');
	}

	//GET phrase
	public function edit(Phrase $phrase, Request $request)
	{
		return response()->json($phrase);
	}

	//PUT
	public function update(Phrase $phrase, Request $request)
	{
		$phrase->category = $request->category;
		$phrase->phrase = $request->phrase;
		$phrase->save();

		return response()->json('success');
	}

	//DELETE
	public function delete(Phrase $phrase, Request $request)
	{
		$phrase->delete();

		return response()->json('success');
	}
}
