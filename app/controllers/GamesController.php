<?php

class GamesController extends BaseController
{
	public function index()
	{
		$games = Game::all();
		return View::make('index', compact('games'));
	}
	public function create()
	{
		return View::make('create');
	}
	public function handleCreate()
	{
		$game = new Game;
		$game->title = Input::get('title');
		$game->publisher = Input::get('publisher');
		$game->complete = Input::has('complete');
		$game->save();

		return Redirect::action('GamesController@index');
	}
	public function edit(Game $game)
	{
		return View::make('edit', compact('game'));
	}
	public function handleEdit()
	{
		$game = Game::findOrFail(Input::get('id'));
		$game->title = Input::get('title');
		$game->publisher = Input::get('publisher');
		$game->complete = Input::has('complete');
		$game->save();

		return Redirect::action('GamesController@index');		
	}
	public function delete(Game $game)
	{
		return View::make('delete', compact('game'));
	}
	public function handleDelete()
	{
		$id = Input::get('game');
		$game = Game::findOrFail($id);
		$game->delete();

		return Redirect::action('GamesController@index');
	}
}