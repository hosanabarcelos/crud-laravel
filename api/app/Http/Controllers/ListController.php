<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class ListController extends Controller
{
	//GET
	public function listing(Request $request)
	{
		$ListItem = ListItem::all();

		return response()->json($ListItem);
	}

	//POST
	public function create(Request $request)
	{
		$newPhrase = new ListItem();
		$newPhrase->category = $request->category;
		$newPhrase->phrase = $request->phrase;
		$newPhrase-> save();

		return response()->json('success');
	}

	//GET phrase
	public function edit(ListItem $phrase, Request $request)
	{
		return response()->json($phrase);
	}

	//PUT
	public function update(ListItem $phrase, Request $request)
	{
		$phrase->category = $request->category;
		$phrase->phrase = $request->phrase;
		$phrase->save();

		return response()->json('success');
	}

	public function delete(ListItem $phrase, Request $request)
	{
		$phrase->delete();

		return response()->json('success');
	}
}
