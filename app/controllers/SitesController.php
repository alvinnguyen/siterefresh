<?php

class SitesController extends \BaseController {

	/**
	 * Display a listing of sites
	 *
	 * @return Response
	 */
	public function index()
	{
		$sites = Site::all();

		return View::make('sites.index', compact('sites'));
	}

	/**
	 * Show the form for creating a new site
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sites.create');
	}

	/**
	 * Store a newly created site in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Site::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Site::create($data);

		return Redirect::route('sites.index');
	}

	/**
	 * Display the specified site.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$site = Site::findOrFail($id);
        $headers = get_headers($site->url, 1);
        $content_length = $headers["Content-Length"];
        $content = file_get_contents($site->url, NULL, NULL, NULL, $content_length);
        $content_length_kb = ceil($content_length/1024);
        $content_md5 = md5($content);
		return View::make('sites.show', compact('site','content_length_kb','content_md5'));
	}

	/**
	 * Show the form for editing the specified site.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$site = Site::find($id);

		return View::make('sites.edit', compact('site'));
	}

	/**
	 * Update the specified site in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$site = Site::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Site::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$site->update($data);

		return Redirect::route('sites.index');
	}

	/**
	 * Remove the specified site from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Site::destroy($id);

		return Redirect::route('sites.index');
	}

}
